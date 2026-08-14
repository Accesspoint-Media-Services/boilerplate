
<?php if ($email_address or $phone_number) ?>
    <div class="team-members__single--contact-details">
        
        <h3 class="team-members__single--contact-title">Contact <?php echo esc_html( strtok( get_the_title(), ' ' ) ); ?></h3>
        
        <?php if ($email_address or $phone_number) ?>
            <div class="team-members__single--contact-list">
                <?php if ($phone_number) ?>
                    <div class="team-members__single--contact-item phone-number">
                        <a href="tel::<?php echo($phone_number)?>"><?php echo($phone_number)?></a>
                    </div>
                <?php endif;?>
                <?php if ($email_address) ?>
                    <div class="team-members__single--contact-item email-address">
                        <a href="mailto:<?php echo($email_address)?>"><?php echo($email_address)?></a>
                    </div>
                <?php endif;?>


                <?php if (have_rows('social_media_links') ) : ?>
                    <?php while (have_rows('social_media_links') ) : the_row(); 
                        $icon = the_sub_field('social_media_icon');
                        $link = the_sub_field('link');
                    ?>
                    <div class="team-members__single--social-item ">
                        <?php if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><i class="<?php echo esc_attr( $icon ); ?>"></i> <?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        <?php endif;?>
        
    </div>
<?php endif;?>