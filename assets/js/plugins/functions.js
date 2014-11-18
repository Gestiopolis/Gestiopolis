/*Slider CSS3*/
function slider(spcon, container, items, margin){
  var width = margin + ($(spcon+' '+items).width());
  var maxWidth = width * $(spcon+' '+items).length;
             
  var currentTranslateX = 0;
  $(spcon+' .wrapper-carrusel').css("height", $(spcon+' '+items).height());
  $(container).css("width", maxWidth);
  $(spcon+" .next").on('click', function(e) {
    e.preventDefault();
    if (currentTranslateX - width > -maxWidth + width*3) {
      currentTranslateX -= width;
      $(container).css("left",currentTranslateX);         
    }else{
      currentTranslateX = 0;
      $(container).css("left",currentTranslateX);
    }
  });

  $(spcon+" .prev").on('click', function(e) {
    e.preventDefault();
    if (currentTranslateX + width <= 0) {
      currentTranslateX += width;
      $(container).css("left",currentTranslateX);         
    }else{
      currentTranslateX = -width * ($(spcon+' '+items).length - 4 );
      $(container).css("left",currentTranslateX);
    }
  });
};

var Grid = (function() {
  // list of items
  var $grid = $( '#og-grid' ),
    // the items
    $items = $grid.children( 'li' ),
    // current expanded item's index
    current = -1,
    // position (top) of the expanded item
    // used to know if the preview will expand in a different row
    previewPos = -1,
    // extra amount of pixels to scroll the window
    scrollExtra = 0,
    // extra margin when expanded (between preview overlay and the next items)
    marginExpanded = 8,
    $window = $( window ), winsize,
    $body = $( 'html, body' ),
    // transitionend events
    transEndEventNames = {
      'WebkitTransition' : 'webkitTransitionEnd',
      'MozTransition' : 'transitionend',
      'OTransition' : 'oTransitionEnd',
      'msTransition' : 'MSTransitionEnd',
      'transition' : 'transitionend'
    },
    transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
    // support for csstransitions
    support = Modernizr.csstransitions,
    // default settings
    settings = {
      minHeight : 376,
      speed : 350,
      easing : 'ease'
    };

  function init( config ) {
    // the settings..
    settings = $.extend( true, {}, settings, config );
    // save itemÂ´s size and offset
    saveItemInfo( true );
    // get windowÂ´s size
    getWinSize();
    // initialize some events
    initEvents();
  }

  // add more items to the grid.
  // the new items need to appended to the grid.
  // after that call Grid.addItems(theItems);
  function addItems( $newitems ) {
    $items = $items.add( $newitems );

    $newitems.each( function() {
      var $item = $( this );
      $item.data( {
        offsetTop : $item.offset().top,
        height : $item.height()
      } );
    } );

    initItemsEvents( $newitems );
  }

  // saves the item's offset top and height (if saveheight is true)
  function saveItemInfo( saveheight ) {
    $items.each( function() {
      var $item = $( this );
      $item.data( 'offsetTop', $item.offset().top );
      if( saveheight ) {
        $item.data( 'height', $item.height() );
      }
    } );
  }

  function initEvents() {
    // when clicking an item, show the preview with the item's info and large image.
    // close the item if already expanded.
    // also close if clicking on the item's cross
    initItemsEvents( $items );
    // on window resize get the window's size again
    // reset some values..
    $window.on( 'debouncedresize', function() {
      scrollExtra = 0;
      previewPos = -1;
      // save itemÂ´s offset
      saveItemInfo();
      getWinSize();
      var preview = $.data( this, 'preview' );
      if( typeof preview != 'undefined' ) {
        hidePreview();
      }
    } );
  }

  function initItemsEvents( $items ) {
    $items.on( 'click', 'span.og-close', function() {
      hidePreview();
      return false;
    } ).children( 'a' ).on( 'click', function(e) {

      var $item = $( this ).parent();
      // check if item already opened
      current === $item.index() ? hidePreview() : showPreview( $item );
      return false;

    } );
  }

  function getWinSize() {
    winsize = { width : $window.width(), height : $window.height() };
  }

  function showPreview( $item ) {
    var preview = $.data( this, 'preview' ),
      // itemÂ´s offset top
      position = $item.data( 'offsetTop' );

    scrollExtra = 0;

    // if a preview exists and previewPos is different (different row) from itemÂ´s top then close it
    if( typeof preview != 'undefined' ) {

      // not in the same row
      if( previewPos !== position ) {
        // if position > previewPos then we need to take te current previewÂ´s height in consideration when scrolling the window
        if( position > previewPos ) {
          scrollExtra = preview.height;
        }
        hidePreview();
      }
      // same row
      else {
        preview.update( $item );
        return false;
      }
    }

    // update previewPos
    previewPos = position;
    // initialize new preview for the clicked item
    preview = $.data( this, 'preview', new Preview( $item ) );
    // expand preview overlay
    preview.open();

  }

  function hidePreview() {
    current = -1;
    var preview = $.data( this, 'preview' );
    preview.close();
    $.removeData( this, 'preview' );
  }

  // the preview obj / overlay
  function Preview( $item ) {
    this.$item = $item;
    this.expandedIdx = this.$item.index();
    this.create();
    this.update();
  }

  Preview.prototype = {
    create : function() {
      // create Preview structure:
      this.$loading = $( '<div class="og-loading"></div>' );
      this.$fullContent = $( '<div class="og-content"></div>' );
      this.$closePreview = $( '<span class="og-close"><i class="icon-remove"></i></span>' );
      this.$previewInner = $( '<div class="og-expander-inner"></div>' ).append( this.$closePreview, this.$fullContent, this.$loading );
      this.$previewContainer = $( '<div class="container"></div>' ).append( this.$previewInner );
      this.$previewEl = $( '<div class="og-expander"></div>' ).append( this.$previewContainer );
      // append preview element to the item
      this.$item.append( this.getEl() );
      // set the transitions for the preview and the item
      if( support ) {
        this.setTransition();
      }
    },
    update : function( $item ) {
      if( $item ) {
        this.$item = $item;
      }
      // if already expanded remove class "og-expanded" from current item and add it to new item
      if( current !== -1 ) {
        var $currentItem = $items.eq( current );
        $currentItem.removeClass( 'og-expanded' );
        this.$item.addClass( 'og-expanded' );
        // position the preview correctly
        this.positionPreview();
        this.$item.find( '.og-content' ).tinyscrollbar_update('top');
      }

      // update current value
      current = this.$item.index();

      // update preview's content
      var $itemEl = this.$item.find( 'i[class*="icon-cat-"]' ),
        eldata = {
          idcat : $itemEl.attr( 'class' ).slice(9),
          type : $grid.attr( 'rel' )
        };
      this.$item.find( '.og-expander-inner' ).css('height', 100);
      this.$loading.show();
      var self = this;
      $.post(functionsUrl+"functions/recientes-eje-home.php", { "idcat": eldata.idcat, "type": eldata.type },
        function(data){
          self.$item.find( '.og-expander-inner' ).height('100%');
          self.$loading.hide();
          self.$fullContent.html( data );
          self.$item.find( '.og-content' ).tinyscrollbar();
        });
    },
    open : function() {

      setTimeout( $.proxy( function() {
        // set the height for the preview and the item
        this.setHeights();
        // scroll to position the preview in the right place
        this.positionPreview();
      }, this ), 25 );

    },
    close : function() {

      var self = this,
        onEndFn = function() {
          if( support ) {
            $( this ).off( transEndEventName );
          }
          self.$item.removeClass( 'og-expanded' );
          self.$previewEl.remove();
        };

      setTimeout( $.proxy( function() {

        this.$previewEl.css( 'height', 0 );
        // the current expanded item (might be different from this.$item)
        var $expandedItem = $items.eq( this.expandedIdx );
        $expandedItem.css( 'height', $expandedItem.data( 'height' ) ).on( transEndEventName, onEndFn );

        if( !support ) {
          onEndFn.call();
        }

      }, this ), 25 );
      return false;

    },
    calcHeight : function() {
      var type = $grid.attr( 'rel' );
      if(type == 'reci'){
        heightPreview = settings.minHeight;
        itemHeight = settings.minHeight + this.$item.data( 'height' ) + marginExpanded;
      }else if(type == 'abcg') {
        heightPreview = 544;
        itemHeight = 544 + this.$item.data( 'height' ) + marginExpanded;
      }

      this.height = heightPreview;
      this.itemHeight = itemHeight;

    },
    setHeights : function() {

      var self = this,
        onEndFn = function() {
          if( support ) {
            self.$item.off( transEndEventName );
          }
          self.$item.addClass( 'og-expanded' );
        };

      this.calcHeight();
      this.$previewEl.css( 'height', this.height );
      this.$item.css( 'height', this.itemHeight ).on( transEndEventName, onEndFn );

      if( !support ) {
        onEndFn.call();
      }

    },
    positionPreview : function() {

      // scroll page
      // case 1 : preview height + item height fits in windowÂ´s height
      // case 2 : preview height + item height does not fit in windowÂ´s height and preview height is smaller than windowÂ´s height
      // case 3 : preview height + item height does not fit in windowÂ´s height and preview height is bigger than windowÂ´s height
      var position = this.$item.data( 'offsetTop' ),
        previewOffsetT = this.$previewEl.offset().top - scrollExtra,
        scrollVal = this.height + this.$item.data( 'height' ) + marginExpanded <= winsize.height ? position : this.height < winsize.height ? previewOffsetT - ( winsize.height - this.height ) : previewOffsetT;
      $body.animate( { scrollTop : scrollVal }, settings.speed );

    },
    setTransition  : function() {
      this.$previewEl.css( 'transition', 'height ' + settings.speed + 'ms ' + settings.easing );
      this.$item.css( 'transition', 'height ' + settings.speed + 'ms ' + settings.easing );
    },
    getEl : function() {
      return this.$previewEl;
    }
  }

  return { 
    init : init,
    addItems : addItems
  };

})();

var Boxgrid = (function() {

  var $items = $( 'td.ejes-table .col-md-6 > a[class*="cat-bg-"]' ),
    transEndEventNames = {
      'WebkitTransition' : 'webkitTransitionEnd',
      'MozTransition' : 'transitionend',
      'OTransition' : 'oTransitionEnd',
      'msTransition' : 'MSTransitionEnd',
      'transition' : 'transitionend'
    },
    // transition end event name
    transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
    // window and body elements
    $window = $( window ),
    $body = $( 'BODY' ),
    // transitions support
    supportTransitions = Modernizr.csstransitions,
    // current item's index
    current = -1,
    // window width and height
    winsize = getWindowSize();

  function init( options ) {    
    // apply fittext plugin
    //$items.find( 'div.rb-week > div span' ).fitText( 0.3 ).end().find( 'span.rb-city' ).fitText( 0.5 );
    initEvents();
  }

  function initEvents() {
    
    $items.each( function() {

      var $item = $( this ),
        $close = $item.find( 'span.rb-close' ),
        $overlay = $item.children( 'div.rb-overlay' );

      $item.on( 'click', function(e) {
        e.preventDefault();
        if( $item.data( 'isExpanded' ) ) {
          return false;
        }
        $item.data( 'isExpanded', true );
        // save current item's index
        current = $item.index();

        var layoutProp = getItemLayoutProp( $item ),
          clipPropFirst = 'rect(' + layoutProp.top + 'px ' + ( layoutProp.left + layoutProp.width ) + 'px ' + ( layoutProp.top + layoutProp.height ) + 'px ' + layoutProp.left + 'px)',
          clipPropLast = 'rect(0px ' + winsize.width + 'px ' + winsize.height + 'px 0px)';

        $overlay.css( {
          clip : supportTransitions ? clipPropFirst : clipPropLast,
          opacity : 1,
          zIndex: 9999,
          pointerEvents : 'auto'
        } );

        if( supportTransitions ) {
          $overlay.on( transEndEventName, function() {

            $overlay.off( transEndEventName );

            setTimeout( function() {
              $overlay.css( 'clip', clipPropLast ).on( transEndEventName, function() {
                $overlay.off( transEndEventName );
                $body.css( 'overflow-y', 'hidden' );
              } );
            }, 25 );

          } );
        }
        else {
          $body.css( 'overflow-y', 'hidden' );
        }

      } );

      $close.on( 'click', function() {

        $body.css( 'overflow-y', 'auto' );

        var layoutProp = getItemLayoutProp( $item ),
          clipPropFirst = 'rect(' + layoutProp.top + 'px ' + ( layoutProp.left + layoutProp.width ) + 'px ' + ( layoutProp.top + layoutProp.height ) + 'px ' + layoutProp.left + 'px)',
          clipPropLast = 'auto';

        // reset current
        current = -1;

        $overlay.css( {
          clip : supportTransitions ? clipPropFirst : clipPropLast,
          opacity : supportTransitions ? 1 : 0,
          pointerEvents : 'none'
        } );

        if( supportTransitions ) {
          $overlay.on( transEndEventName, function() {

            $overlay.off( transEndEventName );
            setTimeout( function() {
              $overlay.css( 'opacity', 0 ).on( transEndEventName, function() {
                $overlay.off( transEndEventName ).css( { clip : clipPropLast, zIndex: -1 } );
                $item.data( 'isExpanded', false );
              } );
            }, 25 );

          } );
        }
        else {
          $overlay.css( 'z-index', -1 );
          $item.data( 'isExpanded', false );
        }

        return false;

      } );

    } );

    $( window ).on( 'debouncedresize', function() { 
      winsize = getWindowSize();
      // todo : cache the current item
      if( current !== -1 ) {
        $items.eq( current ).children( 'div.rb-overlay' ).css( 'clip', 'rect(0px ' + winsize.width + 'px ' + winsize.height + 'px 0px)' );
      }
    } );

  }

  function getItemLayoutProp( $item ) {
    
    var scrollT = $window.scrollTop(),
      scrollL = $window.scrollLeft(),
      itemOffset = $item.offset();

    return {
      left : itemOffset.left - scrollL,
      top : itemOffset.top - scrollT,
      width : $item.outerWidth(),
      height : $item.outerHeight()
    };

  }

  function getWindowSize() {
    $body.css( 'overflow-y', 'hidden' );
    var w = $window.width(), h =  $window.height();
    if( current === -1 ) {
      $body.css( 'overflow-y', 'auto' );
    }
    return { width : w, height : h };
  }

  return { init : init };

})();
/*
Script Name: Javascript Cookie Script
Author: Public Domain, with some modifications
Script Source URI: http://techpatterns.com/downloads/javascript_cookies.php
Version 1.1.2
Last Update: 5 November 2009

Changes:
1.1.2 explicitly declares i in Get_Cookie with var
1.1.1 fixes a problem with Get_Cookie that did not correctly handle case
where cookie is initialized but it has no "=" and thus no value, the 
Get_Cookie function generates a NULL exception. This was pointed out by olivier, thanks
1.1.0 fixes a problem with Get_Cookie that did not correctly handle
cases where multiple cookies might test as the same, like: site1, site
This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
*/

// this fixes an issue with the old method, ambiguous values 
// with this test document.cookie.indexOf( name + "=" );

// To use, simple do: Get_Cookie('cookie_name'); 
// replace cookie_name with the real cookie name, '' are required
function getCookie( check_name ) {
  // first we'll split this cookie up into name/value pairs
  // note: document.cookie only returns name=value, not the other components
  var a_all_cookies = document.cookie.split( ';' );
  var a_temp_cookie = '';
  var cookie_name = '';
  var cookie_value = '';
  var b_cookie_found = false; // set boolean t/f default f
  var i = '';
  
  for ( i = 0; i < a_all_cookies.length; i++ )
  {
    // now we'll split apart each name=value pair
    a_temp_cookie = a_all_cookies[i].split( '=' );
    
    
    // and trim left/right whitespace while we're at it
    cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
  
    // if the extracted name matches passed check_name
    if ( cookie_name == check_name )
    {
      b_cookie_found = true;
      // we need to handle case where cookie has no value but exists (no = sign, that is):
      if ( a_temp_cookie.length > 1 )
      {
        cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
      }
      // note that in cases where cookie is initialized but no value, null is returned
      return cookie_value;
      break;
    }
    a_temp_cookie = null;
    cookie_name = '';
  }
  if ( !b_cookie_found ) 
  {
    return null;
  }
}

/*
only the first 2 parameters are required, the cookie name, the cookie
value. Cookie time is in milliseconds, so the below expires will make the 
number you pass in the Set_Cookie function call the number of days the cookie
lasts, if you want it to be hours or minutes, just get rid of 24 and 60.

Generally you don't need to worry about domain, path or secure for most applications
so unless you need that, leave those parameters blank in the function call.
*/
function setCookie( name, value, expires, path, domain, secure ) {
  // set time, it's in milliseconds
  var today = new Date();
  today.setTime( today.getTime() );
  // if the expires variable is set, make the correct expires time, the
  // current script below will set it for x number of days, to make it
  // for hours, delete * 24, for minutes, delete * 60 * 24
  if ( expires )
  {
    expires = expires * 1000 * 60 * 60 * 24;
  }
  //alert( 'today ' + today.toGMTString() );// this is for testing purpose only
  var expires_date = new Date( today.getTime() + (expires) );
  //alert('expires ' + expires_date.toGMTString());// this is for testing purposes only

  document.cookie = name + "=" +escape( value ) +
    ( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) + //expires.toGMTString()
    ( ( path ) ? ";path=" + path : "" ) + 
    ( ( domain ) ? ";domain=" + domain : "" ) +
    ( ( secure ) ? ";secure" : "" );
}

// this deletes the cookie when called
function deleteCookie( name, path, domain ) {
  if ( getCookie( name ) ) document.cookie = name + "=" +
      ( ( path ) ? ";path=" + path : "") +
      ( ( domain ) ? ";domain=" + domain : "" ) +
      ";expires=Thu, 01-Jan-1970 00:00:01 GMT";
}