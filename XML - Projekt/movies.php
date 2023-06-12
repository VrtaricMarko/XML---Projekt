<html>
    <head>
        <title>MovieHunter</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-func.js"></script>
    </head>
    <body>
        <div id="shell">
            <div id="header">
                <h1 id="logo"><a href="#">MovieHunter</a></h1>
                <div class="social"> <span>FOLLOW US ON:</span>
                <ul>
                    <li><a class="twitter" href="#">twitter</a></li>
                    <li><a class="facebook" href="#">facebook</a></li>
                    <li><a class="vimeo" href="#">vimeo</a></li>
                    <li><a class="rss" href="#">rss</a></li>
                </ul>
                </div>
                <div id="navigation">
                <ul>
                    <li><a class="active" href="#">HOME</a></li>
                    <li><a href="#">NEWS</a></li>
                    <li><a href="#">IN THEATERS</a></li>
                    <li><a href="#">COMING SOON</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="#">ADVERTISE</a></li>
                </ul>
                </div>
                <div id="sub-navigation">
                <ul>
                    <li><a href="#">SHOW ALL</a></li>
                    <li><a href="#">LATEST TRAILERS</a></li>
                    <li><a href="#">TOP RATED</a></li>
                    <li><a href="#">MOST COMMENTED</a></li>
                </ul>
                <div id="search">
                    <form action="#" method="get" accept-charset="utf-8">
                    <label for="search-field">SEARCH</label>
                    <input type="text" name="search field" value="Enter search here" id="search-field" class="blink search-field"  />
                    <input type="submit" value="GO!" class="search-button" />
                    </form>
                </div>
                </div>
            </div>

            <?php
                $movies = simplexml_load_file('movies.xml');

                function createMovieElement($movie, $movieIndex)
                {
                    $name = (string) $movie->name;
                    $year = (string) $movie->year;
                    $genre = (string) $movie->genre;
                    $image = 'movie' . ($movieIndex + 1);

                    echo '<div class="movie">';
                    echo '<div class="movie-image">';
                    echo '<span class="play"><span class="name">' . $name . '</span></span>';
                    echo '<a href="#"><img src="css/images/' . $image . '.jpg" alt="" /></a>';
                    echo '</div>';
                    echo '<div class="rating">';
                    echo '<p style="width: 152px;">' . $name . '</p>';
                    echo '<p style="color: rgb(211, 211, 8); margin-top: 5px; width: 152px;">➥ ' . $year . '</p>';
                    echo '<p style="color: rgb(211, 211, 8); font-size: 11px; margin-top: 5px; width: 152px;">' . $genre . '</p>';
                    echo '</div>';
                    echo '</div>';
                }

            ?>

            <div id="main">
                <div id="content">
                    <div class="box">
                        <div class="head">
                            <h2>LATEST TRAILERS</h2>
                            <p class="text-right"><a href="#">See all</a></p>
                        </div>
                        <?php
                        $movieIndex = 0;
                        foreach ($movies->LATEST_TRAILERS->movie as $movie) {
                            createMovieElement($movie, $movieIndex);
                            $movieIndex++;
                        }
                        ?>
                        <div class="cl">&nbsp;</div>
                    </div>
                    <div class="box">
                        <div class="head">
                            <h2>TOP RATED</h2>
                            <p class="text-right"><a href="#">See all</a></p>
                        </div>
                        <?php
                        foreach ($movies->TOP_RATED->movie as $movie) {
                            createMovieElement($movie, $movieIndex);
                            $movieIndex++;
                        }
                        ?>
                        <div class="cl">&nbsp;</div>
                    </div>
                    <div class="box">
                        <div class="head">
                            <h2>MOST COMMENTED</h2>
                            <p class="text-right"><a href="#">See all</a></p>
                        </div>
                        <?php
                        foreach ($movies->MOST_COMMENTED->movie as $movie) {
                            createMovieElement($movie, $movieIndex);
                            $movieIndex++;
                        }
                        ?>
                        <div class="cl">&nbsp;</div>
                    </div>
                </div>
            </div>

            <div id="footer">
                <p class="lf">Copyright &copy; 2023 <a href="#">Tehničko Veleučilište Zagreb</a> - Informatički Dizajn</p>
                <p class="rf">Design by <a href="#">Marko Vrtarić</a></p>
                <div style="clear:both;"></div>
            </div>
        </div>
    </body>
</html>