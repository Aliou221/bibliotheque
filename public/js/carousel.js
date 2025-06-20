window.addEventListener('load', ()=>{
    let carousels = document.querySelectorAll('.carousel');
    let arrows = document.querySelectorAll('.arrow')
    
    carousels.forEach((carousel)=>{
        let cards = carousel.querySelectorAll('.card')

        cards.forEach((card) =>{
            card.classList.add('my-card');        
        })

        function resizeWindows(){
            window.innerWidth < 1200 ? 
            cards.forEach((card) => card.style.maxWidth = `${window.innerWidth / 2}px`) :
            cards.forEach((card) => card.style.maxWidth = `${window.innerWidth / 3}px`)
        }

        window.addEventListener('resize', resizeWindows)

        function transformCard(cards , count){
            cards.forEach((card) => card.style.transform = `translateX(-${(card.clientWidth + 10) * count}px)`)
        }

        let count = 0;

        arrows.forEach((arr , index)=>{
            arr.addEventListener('click', ()=>{
                if(index % 2 == 0 ){
                    count > 0 && count <= cards.length ? count-- : count = cards.length - 1;
                }else{
                    count < cards.length - 1 ? count++ : count = 0;
                }
                transformCard(cards , count);
            })
        })
        resizeWindows()
    })
})