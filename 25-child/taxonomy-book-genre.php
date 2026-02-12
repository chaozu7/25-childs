<?php get_header(); ?>

<main id="main-content" class="site-main genre-archive">
    <header class="archive-header">
        <h1 class="archive-title">
            <?php _e( 'Genre:', 'twentyfifthchild' ); ?> <?php single_term_title(); ?>
        </h1>
        <?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
    </header>

    <?php if ( have_posts() ) : ?>
    <div class="books-grid">
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'book-item' ); ?>>

            <?php if ( has_post_thumbnail() ) : ?>
            <div class="book-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'medium' ); ?>
                </a>
            </div>
            <?php endif; ?>

            <h2 class="book-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="book-meta">
                <!-- Meta Boxa -->
                <?php $p_date = get_post_meta( get_the_ID(), '_fz_publication_date', true ); ?>
                <?php if ( $p_date ) : ?>
                <span class="pub-date">
                    <strong><?php _e( 'Date:', 'twentyfifthchild' ); ?></strong>
                    <?php echo date_i18n( get_option( 'date_format' ), strtotime( $p_date ) ); ?>
                </span>
                <?php endif; ?>
            </div>

            <div class="book-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </article>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <nav class="pagination">
        <?php 
            echo paginate_links( array(
                'prev_text'          => __( '« Previous', 'twentyfifthchild' ),
                'next_text'          => __( 'Next »', 'twentyfifthchild' ),
                'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifthchild' ) . ' </span>',
            ) ); 
            ?>
    </nav>

    <?php else : ?>
    <p><?php _e( 'No books found in this genre.', 'twentyfifthchild' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>