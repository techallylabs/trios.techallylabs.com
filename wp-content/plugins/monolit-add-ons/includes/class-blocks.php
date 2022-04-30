<?php 
/* add_ons_php */

class Esb_Class_Blocks {
    private static $_instance;

    public function __construct( ) {
        $this->init();
    }
    protected function init(){
        
        add_action('enqueue_block_assets', array($this, 'block_assets') );
        add_action('enqueue_block_editor_assets', array($this, 'block_editor_assets') );
        add_action('block_categories', array($this, 'block_categories'), 10, 2 );

    }

    public function block_assets(){
        wp_enqueue_style( 'monolit-blocks', BBT_DIR_URL . 'assets/css/blocks.min.css' );
    }

    public function block_editor_assets(){
        
        wp_enqueue_script(
            'monolit-blocks',
            BBT_DIR_URL . 'assets/js/blocks.min.js',
            array('wp-i18n','wp-blocks','wp-editor'),
            true
        );

        wp_set_script_translations( 'monolit-blocks', 'monolit-add-on' );
    }

    public function block_categories( $categories, $post ){
        if ( $post->post_type !== 'portfolio' ) {
            return $categories;
        }
        return array_merge(
            $categories,
            array(
                array(
                    'slug' => 'cththemes',
                    'title' => __( 'CTHthemes', 'monolit-add-ons' ),
                    'icon'  => 'admin-multisite',
                ),
            )
        );
    }

    public static function getInstance() {
        if ( ! ( self::$_instance instanceof self ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

}

Esb_Class_Blocks::getInstance();