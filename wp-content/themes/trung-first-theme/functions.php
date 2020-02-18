<?php
    add_action('wp_enqueue_scripts', 'university_files');
    add_action( 'wpb_custom_cron', 'wpb_custom_cron_func' );
    add_action('after_setup_theme', 'university_features');

    function university_files(){
        wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
        wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('university_main_styles', get_stylesheet_uri());
        // wp_enqueue_style('boostrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
        // wp_enqueue_style('popup', get_theme_file_uri('resources/css/popup.css'));
        // wp_enqueue_style('mystyle', get_theme_file_uri('resources/css/mystyle.css'));
        // wp_enqueue_script('popupjs', get_theme_file_uri('resources/js/popup.js'), NULL, microtime(), true);
    }
    
    function university_features(){
        register_nav_menu('headerMenuLocation', 'Header Menu Location');
        add_theme_support('title-tag');
    }
    $conn = dbConnection();
    function dbConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "saras_care";
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            console_log("connection failed: " . $e->getMessage());
            // echo "connection failed: " . $e->getMessage() . "<br/>";
            return false;
        }
        return $conn;
    }
    function insert_news_data($conn, $author, $title, $descriptions, $url, $urlToImage, $publishedAt, $content){
        
        try{
            $sql = "INSERT INTO news_v2 (author, title, descriptions, url, urlToImage, publishedAt, content)
                    VALUES (
                        :author,
                        :title,
                        :descriptions,
                        :url,
                        :urlToImage,
                        :publishedAt,
                        :content
                    )
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':descriptions', $descriptions);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':urlToImage', $urlToImage);
            $stmt->bindParam(':publishedAt', $publishedAt);
            $stmt->bindParam(':content', $content);

            $stmt->execute();
            // console_log("New record created successfully");
            // echo "New record created successfully" . "<br/>";
        } catch(PDOException $e){
            // console_log("insert failed: " . $e->getMessage());
            // echo "connection failed: " . $e->getMessage() . "<br/>";
            return false;
        }
        $conn = null;
        return true;
    }
    function wpb_custom_cron_func() {
        // include "./controller/news_controller.php";
        $conn = $GLOBALS['conn'];
        $d = strtotime("-2 weeks");
        $date = date("Y-m-d", $d);
        $url = "https://newsapi.org/v2/everything?q=female%20foeticide&sortBy=publishedAt&from=" . $date . "&apiKey=940595c3bdf849ca8ae32ceed8f5e048";
        // echo $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $data = curl_exec($ch);
        curl_close($ch);
        $articles = json_decode($data)->articles;
        // insert_news_data($conn, $articles[0]->author, $articles[0]->title, "1", "1", "1", "1", "1");
        // insert_news_data($conn, $articles[1]->author, $articles[1]->title, "2", "2", "2", "2", "2");
        // $i = 0; 
        // while ($i < count($articles)){
        //     insert_news_data($conn, $articles[$i]->author, $articles[$i]->title, "description", $articles[$i]->url, $articles[$i]->urlToImage, $articles[$i]->publishedAt, "content");
        //     $i++;
        // }
        foreach($articles as $article){
            insert_news_data($conn, $article->author, $article->title, "description", $article->url, $article->urlToImage, $article->publishedAt, "content");
          
        }
        $conn = null;
    }
    
?>
