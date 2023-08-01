
document.addEventListener('DOMContentLoaded',function(){
    

const stripe= Stripe("pk_test_51NIdQaCKQuFl3GphZmge2Is3Qh37JatBZUC0ltWcOj2U5DYNohFsMAeqW0S07Jxnauv47UTEwvtA9g0nqGEqAU8I00XG4ThRUJ");

var btn= document.querySelector("#btn");

btn.addEventListener("click",()=>{

    fetch("donate.php",{
        method: "post",
        headers:{
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({}),
        
    }).then(res=>res.json()).then(

        payload=>{

            stripe.redirectToCheckout({sessionId:payload.id});

        }
    );
});
});