<?php
/*
Template Name: Home 
*/

require_once('includes/form-contact.php');

get_header(); ?>

    <?php if ( have_posts() ) : the_post(); ?>

        <section class="slider" id="slider">
          <?php
echo do_shortcode('[smartslider3 slider="2"]');
?>
        </section>

        <section class="philo">
            <div class="container">
                <div class="philo-content">
                    <h2 class='title-home'><?php the_field('philoTitle'); ?></h2>
                    <?php the_field('philoText'); ?>
                    <?php
                        $link1 = get_field('philoLink1');
                        $link2 = get_field('philoLink2');
                        $link3 = get_field('philoLink3');

                        if( $link1 || $link2 || $link3 ) :
                    ?>
                        <ul class="philo-list">
                            <?php if( $link1 ) : ?>
                                <li>
                                    <a href="<?php echo $link1['url']; ?>"><?php echo $link1['title']; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if( $link2 ) : ?>
                                <li>
                                    <a href="<?php echo $link2['url']; ?>"><?php echo $link2['title']; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if( $link3 ) : ?>
                                <li>
                                    <a href="<?php echo $link3['url']; ?>"><?php echo $link3['title']; ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php if( have_rows('videos') ) : ?>
            <section class="videos-wrapper">
                <div class="container">
                    <h2 class='title-home'><?php the_field('videosTitle'); ?></h2>
                </div>
                <div class="videos-slider" id="videos">
                    <div class='videos' id="videos-slider">
                        <?php $count = 0; while( have_rows('videos') ) : the_row(); ?>
                            <div class="slide-video <?php if($count === 0) echo "on"; ?>" data-index="<?php echo $count; ?>">
                                <div class="video-wrapper">
                                    <div data-vimeo-url="<?php the_sub_field('video'); ?>" class="video">
                                        <div class="cover js-cover" style="background-image:url(<?php the_sub_field('cover'); ?>)"></div>
                                    </div>
                                </div>
                                <div class="js-video-text">
                                    <div class="video-text">
                                        <?php the_sub_field('text'); ?>
                                        <p class="video-author">
                                            <?php if($author = get_sub_field('author')) : ?>
                                                <strong><?php echo $author; ?></strong>
                                            <?php endif; ?>
                                            <?php echo wp_get_attachment_image(get_sub_field('logo')); ?>
                                        </p>
                                    </div>
                                    <?php if($btn = get_sub_field('btn')) : ?>
                                        <a href="<?php echo $btn['url']; ?>" class="btn"><?php echo $btn['title']; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php $count++; endwhile; ?>
                    </div>

                    <ul class="video-nav">
                        <?php $count = 0; while( have_rows('videos') ) : the_row(); ?>
                            <li>
                                <button type="button" class="js-video-nav" data-slide="<?php echo $count; ?>">
                                    <div class="cover js-cover" style="background-image:url(<?php the_sub_field('cover'); ?>)"></div>
                                </button>
                            </li>
                        <?php $count++; endwhile; ?>
                    </ul>

                    <button class="js-video-next video-next" type="button">
                        <svg class="icon"><use xlink:href="#icon-right"></use></svg>
                    </button>
                    <button class="js-video-prev video-prev" type="button">
                        <svg class="icon"><use xlink:href="#icon-left"></use></svg>
                    </button>

                    <button class="js-video-next video-next-big" type="button" tabindex="-1">Next video</button>
                    <button class="js-video-prev video-prev-big" type="button" tabindex="-1">Previous video</button>

                    <div id="video-text" class="video-text-wrapper"></div>
                </div>
            </section>
        <?php endif; ?>

        <section class="team-wrapper">
            <div class="container">
                <h2 class='title-home'><?php the_field('whoTitle'); ?></h2>
                <div class='team'>
                    <div class='img'>
                        <div>
                            <?php echo wp_get_attachment_image(get_field('whoImg'), 'large'); ?>
                        </div>
                    </div>
                    <div class='txt'>
                        <?php the_field('whoText'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-news">
            <div class="container">
                <h2 class='title-home'><?php the_field('title', get_option('page_for_posts' )); ?></h2>

                <?php include_once('includes/spotlight.php'); ?>

                <?php
                    $queryPost = new WP_Query( array(
                        'post__not_in' => array($sticky),
                        'posts_per_page' => 3,
                        'ignore_sticky_posts' => 1
                    ));
                    if($queryPost->have_posts()):
                ?>
                    <div class='posts home-posts'>
                        <?php while ( $queryPost->have_posts() ) : $queryPost->the_post(); ?>
                            <div>
                                <p class="meta">
                                    <time datetime='<?php echo get_the_date('Y-m-d'); ?>' class='date'><?php echo get_the_date(); ?></time>
                                    <?php
                                        $categories = get_the_category();
                                        $count = 0;
                                        if($categories) :
                                            foreach($categories as $category):
                                                if($count > 0) echo ', ';
                                                echo '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '?cat=' . $category->slug . '">' . $category->name . '</a>';
                                                $count ++;
                                            endforeach;
                                        endif;
                                    ?>
                                </p>
                                <h4 class="h6"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4>
                                <?php the_excerpt(); ?>
                                <a href='<?php the_permalink(); ?>' class='btn'>Read</a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="home-posts-link">
                        <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="link">See all</a>
                    </div>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>

        <?php echo do_shortcode('[elementor-template id="1227636"]'); ?>


    <?php endif; ?>

<?php get_footer(); ?>
