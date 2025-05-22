<?php
     /**
      * Plugin Name: Mindset Blocks
      * Description: Custom blocks for displaying company information.
      * Version: 1.0.0
      * Author: Your Name
      */
     defined( 'ABSPATH' ) || exit;

     /**
      * Register the Company Address block.
      */
     function mindset_blocks_register_block() {
         register_block_type( __DIR__ . '/build/company-address' );
     }
     add_action( 'init', 'mindset_blocks_register_block' );

     /**
      * Register the custom meta field for the company address.
      */
     function mindset_blocks_register_meta() {
         register_post_meta(
             'page',
             'company_address',
             array(
                 'show_in_rest' => true,
                 'single' => true,
                 'type' => 'string',
             )
         );
     }
     add_action( 'init', 'mindset_blocks_register_meta' );
     ?>