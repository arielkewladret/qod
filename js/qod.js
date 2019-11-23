(function($) {
  console.log('hello');
  $(function() {
    let lastPage = '';

    $('#new-quote-button').on('click', function(event) {
      event.preventDefault();

      lastPage = document.URL;

      // 1: get request to grab random post and append to the DOM

      // add a click event for the "Show Me Another" btn and then run the AJAX code below
      $.ajax({
        method: 'GET',
        url:
          qod_vars.rest_url +
          '/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1'
      })
        .done(function(data) {
          const post = data[0];
          console.log(post);

          console.log(post.excerpt.rendered);

          const quotesContainer = $('#quote');

          quotesContainer.empty();
          quotesContainer.append(
            `<article>
                ${post.excerpt.rendered}

                <div class="entry-meta">
                  <p>${post._qod_quote_source}</p>

                  <p class="entry-title">${post.title.rendered}</p>
                </div>
              </article>`
          );

          // replace existing quote w new one

          history.pushState(null, null, qod_vars.home_url + '/' + post.slug);
          // 1st value is an object which manages state
          // 2nd value is the url title browser tab
          //3rd value is the url in the browser

          // append the quote to the DOM
        })
        .fail(function(error) {
          console.log('an error occurred', error);
        }); //$ajax.

      //update the page when we click the forward and back buttons
      $(window).on('popstate', function() {
        //update the URL
        window.location.replace(lastPage);

        // 2: post a new quote using the post method
        // using a form to submit a quote so a .submit event
      }); //end of popstate
    }); // end of btn click
  }); // end of doc ready
})(jQuery);

// IIFE Immediatley Invoked Function Expression
// Invoked also means calling a function or just running a function
