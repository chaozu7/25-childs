<?php get_header(); ?>

<main id="main-content" class="site-main book-page">
    <?php while ( have_posts() ) : the_post(); 
        // Publication data form metabox
        $publication_date = get_post_meta( get_the_ID(), '_fz_publication_date', true );
        
        // Book genres
        $genres = get_the_terms( get_the_ID(), 'book-genre' );
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
            <!-- Title -->
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="book-meta-top">
                <!-- Meta Box -->
                <?php if ( $publication_date ) : ?>
                <span class="pub-date">
                    <strong><?php _e( 'Publication Date:', 'twentyfifthchild' ); ?></strong>
                    <time datetime="<?php echo esc_attr( $publication_date ); ?>">
                        <?php echo date_i18n( get_option( 'date_format' ), strtotime( $publication_date ) ); ?>
                    </time>
                </span>
                <?php endif; ?>
            </div>
        </header>

        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="book-featured-image" style="margin: 20px 0;">
            <?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>
        </div>
        <?php endif; ?>

        <!-- Genres -->
        <?php if ( ! empty( $genres ) && ! is_wp_error( $genres ) ) : ?>
        <div class="book-genres-section">
            <strong><?php _e( 'Genres:', 'twentyfifthchild' ); ?></strong>
            <ul class="book-genre-list" style="display: inline; list-style: none; padding: 0;">
                <?php foreach ( $genres as $genre ) : 
                            $more_info_url = get_term_meta( $genre->term_id, 'more_info_url', true );
                        ?>
                <li style="display: inline; margin-right: 10px;">
                    <?php echo esc_html( $genre->name ); ?>
                    <?php if ( $more_info_url ) : ?>
                    <a href="<?php echo esc_url( $more_info_url ); ?>" class="genre-more-info" target="_blank">
                        (<?php _e( 'More Info', 'twentyfifthchild' ); ?>)
                    </a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="entry-content" style="margin-top: 30px;">
            <?php the_content(); ?>
        </div>

        <hr style="margin: 50px 0;">

        <!--  Latest 20 other Books -->
        <section class="latest-books-ajax">
            <h2><?php _e( 'Latest 20 Other Books', 'twentyfifthchild' ); ?></h2>
            <div id="fz-latest-books-loader" data-exclude="<?php the_ID(); ?>">
                <p class="ajax-loader"><?php _e( 'Loading latest books...', 'twentyfifthchild' ); ?></p>
            </div>
        </section>

    </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>