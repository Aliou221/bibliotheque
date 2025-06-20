let sidebar = document.querySelector('.sidebar');
let bar = document.querySelector('.menu')

bar.addEventListener('click', (e)=>{
    sidebar.classList.toggle('sidebar-visible')   
    if(sidebar.classList.contains('sidebar-visible')){
        bar.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="#fff" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                        </svg>` 
    }else{
        bar.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" 
                            fill="#fff" class="bi bi-border-style" 
                            viewBox="0 0 16 16">
                                <path d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-4 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm8 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-4-4a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>`
    }
})

let cards = document.querySelectorAll('.card')

cards.forEach((card , index) =>{
    card.style.animationDelay = `${index * .085}s`
})

let myBtns = document.querySelectorAll('.my-btn')
let myDiv = document.querySelectorAll('.my-div')


myBtns.forEach((btn , index)=>{
    myDiv[1].style.display = "none"
    
    btn.addEventListener('click', (e)=>{
        e.preventDefault()
        myDiv.forEach((div , i)=>{
            if(i === index){
                div.style.display = "block"
                div.style.animationDelay = "0s"
            }else{
                div.style.display = "none"
                div.style.animationDelay = "0s"
            }
        })
    })
})

