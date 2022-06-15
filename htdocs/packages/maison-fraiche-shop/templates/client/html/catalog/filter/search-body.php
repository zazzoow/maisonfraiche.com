<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();


/** client/html/catalog/suggest/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * Note: Up to 2015-02, the setting was available as
 * client/html/catalog/listsimple/url/target
 *
 * @param string Destination of the URL
 * @since 2014.03
 * @see client/html/catalog/suggest/url/controller
 * @see client/html/catalog/suggest/url/action
 * @see client/html/catalog/suggest/url/config
 * @see client/html/catalog/listsimple/url/target
 */

/** client/html/catalog/suggest/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * Note: Up to 2015-02, the setting was available as
 * client/html/catalog/listsimple/url/controller
 *
 * @param string Name of the controller
 * @since 2014.03
 * @see client/html/catalog/suggest/url/target
 * @see client/html/catalog/suggest/url/action
 * @see client/html/catalog/suggest/url/config
 * @see client/html/catalog/listsimple/url/controller
 */

/** client/html/catalog/suggest/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * Note: Up to 2015-02, the setting was available as
 * client/html/catalog/listsimple/url/action
 *
 * @param string Name of the action
 * @since 2014.03
 * @see client/html/catalog/suggest/url/target
 * @see client/html/catalog/suggest/url/controller
 * @see client/html/catalog/suggest/url/config
 * @see client/html/catalog/listsimple/url/action
 */

/** client/html/catalog/suggest/url/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  client/html/<clientname>/url/config = array( 'absoluteUri' => true )
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * Note: Up to 2015-02, the setting was available as
 * client/html/catalog/listsimple/url/config
 *
 * @param string Associative list of configuration options
 * @since 2014.03
 * @see client/html/catalog/suggest/url/target
 * @see client/html/catalog/suggest/url/controller
 * @see client/html/catalog/suggest/url/action
 * @see client/html/url/config
 * @see client/html/catalog/listsimple/url/config
 */

/** client/html/catalog/filter/search/force-search
 * Always reuse the current input for full text searches
 *
 * Normally, the full text search string is added to the input field after each
 * search. This is also the standard behavior of other shops.
 *
 * If it's desired, setting this configuration option to "0" will drop the full
 * text search input so it's not used if the user selects a category or attribute
 * filter.
 *
 * @param boolean True to reuse the search string, false to clear after each search
 * @since 2020.04
 */
$enforce = $this->config( 'client/html/catalog/filter/search/force-search', true );


?>
<?php $this->block()->start( 'catalog/filter/search' ) ?>
<div class="search">
                <div class="search-popup">
                    <div class="container">
                    <div class="page-span-4 page-span"></div>
                    <div class="search-form-wrap">
                     <form action="#" class="search-form">
                         <input type="text" placeholder="Search for..." class="input-search value" autocomplete="off"
                   				name="<?= $enc->attr( $this->formparam( 'f_search' ) ) ?>"
                   				title="<?= $enc->attr( $this->translate( 'client', 'Search' ) ) ?>"
                   				placeholder="<?= $enc->attr( $this->translate( 'client', 'Search' ) ) ?>"
                   				value="<?= $enc->attr( $enforce ? $this->param( 'f_search' ) : '' ) ?>"
                   				data-url="<?= $enc->attr( $this->link( 'client/html/catalog/suggest/url', ['f_search' => '_term_'] ) ) ?>"
                   				data-hint="<?= $enc->attr( $this->translate( 'client', 'Please enter at least three characters' ) ) ?>" required="">

                         <div class="submit-search">
                            <input type="submit" value="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="14px" height="14px">
                                  <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" fill="#FFFFFF"></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                             </svg>
                         </div>
                     </form>
                     </div>
                     <div class="close-search">
                         <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 21.9 21.9" enable-background="new 0 0 21.9 21.9" width="14px" height="14px">
                            <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z" fill="#FFFFFF"></path>
                          </svg>
                     </div>
                    </div>
                </div>
                <div class="search-open">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="16px" height="16px">
                          <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" fill="#FFFFFF"></path><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                    </svg>
                </div>
              </div>
              
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'catalog/filter/search' ) ?>
