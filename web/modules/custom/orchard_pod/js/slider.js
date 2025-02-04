(function (Drupal, drupalSettings) {
    Drupal.behaviors.orchardProductSlider = {
      attach: function (context, settings) {
        console.log('Context:', context); // Para verificar el contexto
        if (context.querySelector('.swiper-container')) {
          console.log('Inicializando Swiper...');
          new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
          });
        }
      }
    };
  })(Drupal, drupalSettings);
  