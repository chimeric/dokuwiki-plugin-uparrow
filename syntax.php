<?php
/**
 * Up-Arrow Plugin: Show s simple arrow-image which links to the top of the current page.
 * 
 * @license     GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author      Michael Klier <chi@chimeric.de>
 */
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_uparrow extends DokuWiki_Syntax_Plugin {
 
    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Michael Klier',
            'email'  => 'chi@chimeric.de',
            'date'   => '2006-01-03',
            'name'   => 'Plugin Uparrow',
            'desc'   => 'Shows an uparrow which links to top of the page.',
            'url'    => 'http://www.chimeric.de/projects/dokuwiki/plugin/uparrow',
        );
    }
 
    function getType(){ return 'substition'; }
    function getPType(){ return 'block'; }
    function getSort(){ return 304; }
    function connectTo($mode) { $this->Lexer->addSpecialPattern('~~UP~~',$mode,'plugin_uparrow'); }
 
    /**
     * Handle the match
     */
    function handle($match, $state, $pos, &$handler){
        if($match == '~~UP~~') { 
            return array(); 
        }
    }
 
    /**
     * Create output
     */
    function render($mode, &$renderer, $data) {
        global $conf;
        if($mode == 'xhtml'){
            $renderer->doc .= '<p class="plugin_uparrow"><a href="#"><img src="'.DOKU_URL.'lib/plugins/uparrow/images/'.$conf['plugin_uparrow']['image'].'" alt="UP"/></a></p>';
            return true;
        } else {
            return false;
        }
    }
        
}

?>
