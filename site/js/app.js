window.addEventListener('load', function () {
    const sliderMain = this.document.querySelector('.slider_main')
    const sliderItems = this.document.querySelectorAll('.slider_item')
    const sliderItemWidth = sliderItems[0].offsetWidth
    const sliderLenght = sliderItems.length
    let index = 0

    // Tự động chuyển slide sau mỗi 3 giây
    function autoSlide() {
        index = (index + 1) % sliderLenght
        sliderMain.style.transform = `translateX(-${index * sliderItemWidth}px)`
    }

    setInterval(autoSlide, 3000)

    // ======== toggle search =========
    const search = document.querySelector('#search')
    const searchBlock = document.querySelector('.search-block')
    
    const formSearch = searchBlock.querySelector('.search-form')
    formSearch.addEventListener('submit', function(e) {
        const searchInput = this.querySelector('.search-input')
        if (searchInput.value.trim() === '') {
            alert('Vui lòng nhập tên sản phẩm trước khi tìm kiếm.')
            e.preventDefault()
        }
    })
    
    search.addEventListener('click', () => searchBlock.classList.toggle('active-search'))
    searchBlock.addEventListener('click', (e) => e.stopPropagation())
})

// ===== favourite product ======
const heartIcons = document.querySelectorAll('.heart-icon')

function toggleHeart(event) {
    const emptyHeart = event.target.classList.contains('heart')
    const filledHeart = event.target.classList.contains('heartRed')

    if (emptyHeart) {
        event.target.style.display = 'none'
        event.target.nextElementSibling.style.display = 'block'
    } else if (filledHeart) {
        event.target.style.display = 'none'
        event.target.previousElementSibling.style.display = 'block'
    }
}

heartIcons.forEach((heartIcon) => {
    heartIcon.addEventListener('click', toggleHeart);
});

// ======= show box modal (tìm đúng kích thước) ========
const modalSize = document.querySelector('#modal-size')
const overlayModal = document.querySelector('#overlay')
const closeIcon = document.querySelector('#close-icon')
const boxModal = document.querySelector('#box-size')

modalSize.addEventListener('click', () => {
    overlayModal.style.display = 'flex'
})

closeIcon.addEventListener('click', () => {
    overlayModal.style.display = 'none'
})

overlayModal.addEventListener('click', () => {
    overlayModal.style.display = 'none'
})

boxModal.addEventListener('click', (e) => {
    e.stopPropagation();
})

// ======== product details ========
const btnPrev = document.querySelector('.btn-prev')
const btnNext = document.querySelector('.btn-next')
const listFavorite = document.querySelector('.favorite-list')
const item = document.querySelector('.favorite-item')
const itemWidth = item.offsetWidth

let debounceTimeout
function handleNextClick() {
    if (debounceTimeout) {
        clearTimeout(debounceTimeout)
    }

    debounceTimeout = setTimeout(() => {
        listFavorite.scrollLeft += itemWidth
    }, 200)
}
btnNext.parentElement.addEventListener('click', handleNextClick)

function handlePrevClick() {
    if (debounceTimeout) {
        clearTimeout(debounceTimeout)
    }

    debounceTimeout = setTimeout(() => {
        listFavorite.scrollLeft -= itemWidth
    }, 200)
}
btnPrev.parentElement.addEventListener('click', handlePrevClick)

listFavorite.addEventListener('wheel', function(e) {
    e.preventDefault()
    const delta = e.deltaY * 2.7
    this.scrollLeft += delta
})

// ========= nav img product details =========
const listImg = document.querySelectorAll('.details-item-img');
const mainPhoto = document.querySelector('.details-img');

[...listImg].forEach(item => {
    item.addEventListener('click', function() {
        [...listImg].forEach(item => item.classList.remove('active-img'))
        this.classList.toggle('active-img')
        mainPhoto.src = this.querySelector('img').src
    })
})

// ======== toggle btn size =========
const btnSizes = document.querySelectorAll('.item-option');
[...btnSizes].forEach(item => {
    item.addEventListener('click', function() {
        [...btnSizes].forEach(item => item.classList.remove('item-option-active'))
        this.classList.toggle('item-option-active')
    })
})




