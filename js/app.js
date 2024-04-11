gsap.registerPlugin(ScrollTrigger, ScrollSmoother) 
// плавный скролл, но не для телефонов.
if(ScrollTrigger.isTouch !==1) {

    ScrollSmoother.create({
        wrapper: '.wrapper',
        content: '.content',
        smooth: 1.5,
        effects: true
    })
// Исчезающий заголовок
    gsap.fromTo('.hero-section', { opacity: 1 }, { 
        opacity:0,
        scrollTrigger: {
            trigger: '.hero-section',
            start: 'center',
            end: '820',
            scrub: true
        }
    })
// Левая сторона
    let itemsL = gsap.utils.toArray('.gallery__left .gallery__item')

    itemsL.forEach(item => {
        gsap.fromTo(item, { x: -80, opacity: 0 }, {
            opacity: 1, x: 0,
            scrollTrigger: {
                trigger: item,
                start: '-850',
                end: '-100',
                scrub: true
            }
        })
    })
// Правая сторона
    let itemsR = gsap.utils.toArray('.gallery__right .gallery__item')

    itemsR.forEach(item => {
        gsap.fromTo(item, { x: 80, opacity: 0 }, {
            opacity: 1, x: 0,
            scrollTrigger: {
                trigger: item,
                start: '-850',
                end: '-100',
                scrub: true
            }
        })
    })
}