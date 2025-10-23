<?php
/*
Template Name: Contact
*/
get_header(); ?>

<main class="wrap">
      <h1><?php the_title(); ?></h1>
<?php if ( isset($_GET["agency_contact_status"]) && $_GET["agency_contact_status"] === "success" ) : ?>
            <p class="notice success"><?php esc_html_e("Messaggio inviato con successo.", "agency-theme"); ?></p>
<?php elseif ( isset($_GET["agency_contact_status"]) && $_GET["agency_contact_status"] === "error" ) : ?>
            <p class="notice error"><?php esc_html_e("Si à¨ verificato un errore durante l\'invio.", "agency-theme"); ?></p>
<?php endif; ?>

      <form method="post" action="<?php echo esc_url( admin_url("admin-post.php") ); ?>">
            <input type="hidden" name="action" value="agency_contact_form">
            <label><?php esc_html_e("Nome", "agency-theme"); ?> <input type="text" name="nome" required></label>
            <label><?php esc_html_e("Email", "agency-theme"); ?> <input type="email" name="email" required></label>
            <label><?php esc_html_e("Messaggio", "agency-theme"); ?> <textarea name="messaggio" required></textarea></label>
            <button type="submit"><?php esc_html_e("Invia", "agency-theme"); ?></button>
      </form>
</main>
<?php get_footer(); ?>
