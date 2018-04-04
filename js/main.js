(function () {
  var Shuffle = window.Shuffle
  var element = document.querySelector('.star-plastics-shuffle-container')
  var sizer = element.querySelector('.star-plastics-sizer-element')

  var shuffleInstance = new Shuffle(element, {
    itemSelector: '.picture-item',
    sizer: sizer // could also be a selector: '.star-plastics-sizer-element'
  })

  function filterItems(e) {
    var val = e.target.getAttribute('name')

    if (e.target.classList.contains('active')) {
      return
    }

    filters.forEach(function(el) {
      el.classList.remove('active')
    })

    e.target.classList.add('active')

    if (val === 'all') {
      shuffleInstance.filter(Shuffle.ALL_ITEMS);
    } else {
      shuffleInstance.filter([val]);
    }
  }

  // attach listeners
  var filters = Array.prototype.slice.call(document.querySelectorAll('button'))
  filters.forEach(function(el) {
    el.addEventListener('click', filterItems)
  })
})()
