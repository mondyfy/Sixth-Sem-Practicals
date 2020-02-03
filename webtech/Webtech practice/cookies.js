const now = new Date();
now.setMonth(now.getMonth()+1);

document.cookie = `username=starscream; expires=${now.toUTCString()}`;

let cookies = document.cookie.split(';');
console.log(cookies)

cookies.forEach((cookie,index)=>{
    console.log(`saved cookie: ${cookie.trim().split('=')[0]} = ${cookie.trim().split('=')[1]}`);
});

