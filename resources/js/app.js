require('./bootstrap');

require('alpinejs');

// const messages_el = document.getElementById('messages');
// const username = document.getElementById('username');
// const name = document.getElementById('name');
// const bennar = document.getElementById('bennar');
// const message_input = document.getElementById('message_input');
// const message_form = document.getElementById('message_form');
//
// message_form.addEventListener('submit',function (e){
//     e.preventDefault();
//     let has_error = false;
//     if (username.value==''){
//         alert('nfjfj');
//         has_error = true;
//     }
//
//     if (message_input.value==''){
//         alert('nfjfj');
//         has_error = true;
//     }
//
//     if (has_error){
//         return;
//     }
//     const options2 = {
//         method:'post',
//         url:'/GetChats',
//         data:{
//             bennar:bennar.value,
//         },
//         transformResponse:[function (data){
//             messages_el.innerHTML = data;
//             console.log(data);
//         }]
//     };
//     const options = {
//         method:'post',
//         url:'/skyapp/send_messages',
//         data:{
//             username:username.value,
//             bennar:bennar.value,
//             message:message_input.value
//         },
//         transformResponse: [ (data) => {
//            // message_form.trigger("reset");
//             return data;
//         }]
//
//     };
//     axios(options);
// });
//
 window.Echo.channel('channelForEmp').listen('NotifyEmp',(e)  =>{
    console.log(e.username);
     alert(e);
    //axios(options2);
    //messages_el.innerHTML += 'ttttttttttttttttttttttttt';
 });