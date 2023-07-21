<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header"> 
        <div class="container">
            <div class="header__text">Redlab Test Task</div>
        </div>    
    </header>
    <main class="main">
        <section class="news-wrapper">
            <div class="container">
                

                    <?php 
                                            
                        $paged = max(1, get_query_var('page'));
                        $args = array(
                            'post_type'      => 'news',
                            'post_parent'    => 0,
                            'posts_per_page' => 6,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'paged'          => $paged
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) { ?>

                            <div class="news-items-wrapper">

                            <?php
                            while ($query->have_posts()) {
                                $query->the_post();
                                ?>
                                <div class="news-item">
                                    <a class="news-item__link" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="news-item__cover-bg">
                                </div> 
                                <?php
                            } ?>

                            </div>
                            
                            <?php

                            // Вивід пагінації
                            echo '<div class="pagination">';
                            echo paginate_links(array(
                                'total'   => $query->max_num_pages,
                                'current' => $paged,
                            ));
                            echo '</div>';
                        }
                        wp_reset_postdata();
                                    
                    ?>
                
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer__text">Copyrights <?php echo date('Y'); ?></div>
        </div>
    </footer>
</body>
</html>