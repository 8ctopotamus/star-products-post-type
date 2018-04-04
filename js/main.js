(function () {
  var Shuffle = window.Shuffle
  var element = document.querySelector('.star-products-shuffle-container')
  var sizer = element.querySelector('.star-products-sizer-element')

  var shuffleInstance = new Shuffle(element, {
    itemSelector: '.picture-item',
    sizer: sizer // could also be a selector: '.my-sizer-element'
  })

  // filter
  function filterItems(e) {
    var val = e.target.getAttribute('name')
    if (val === 'all') {
      shuffleInstance.filter(Shuffle.ALL_ITEMS);
    } else {
      console.log(val)
      shuffleInstance.filter([val]);
    }
  }

  // attach listeners
  var filters = Array.prototype.slice.call(document.querySelectorAll('button'))
  filters.forEach(function(el) {
    el.addEventListener('click', filterItems)
  })
})()
