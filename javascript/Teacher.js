// $(function(){
//   let week=[];
//   let cur= new Date();
//
//   for (let i = 1; i <=7; i++)
//   {
//     let first=new Date();
//      first=cur.getDate()-cur.getDay()+i;
//     //let date=first;//new Date(cur.setDate(first)).toISOString().slice(0,10);
//     let day =new Date(cur.setDate(first)).toString().slice(0,3);
//     let a=i+1;
//     $("#table1 tr").
//             find("th:nth-child("+a+")").
//             append("<span id=weekday"+i+" >"+"<h5 style='text-align: left;'>"+day+"</h5>"+" "+"<h1 style='text-align: left;'>"+first+"</h1>"+"</span>");
//   }
// })
//
// $(document).ready(function(){
//   for (let j = 1; j <=7; j++)
//   {
//
//         var cur = new Date();
//     let date2=new Date();
//     cur.setDate(cur.getDate() +7);
//     cur.setDate(cur.getDate()-cur.getDay()+j);
//     date2=cur;
//     let date=date2.toISOString().slice(8,10);
//     let day=date2.toString().slice(0,3);
//
//     let a=j+1;
//     $("#table2 tr").
//             find("th:nth-child("+a+")").
//             append("<span id=weekday"+j+" >"+"<h5 style='text-align: left;'>"+day+"</h5>"+" "+"<h1 style='text-align: left;'>"+date+"</h1>"+"</span>");
//   }
// });
//
// $(document).ready(function(){
//
//       $("#ButtonForWeek1Table #table1 tr td button").click(function(){
//
//             var a=$(this).prop("id").split('').slice(3);
//             a=a.join('');
//             var b=parseInt(a)-1;
//
//
//             var bool=confirm("Congrats your time will be booked from "+b+" to "+a+". Proceed ?");
//
//             if(bool)
//             {
//                 $(this).html("Booked !").prop("disabled", true).css("background-color","grey").css("color","white");
//             }
//
//       });
//
//
//             $("#ButtonForWeek2Table #table2 tr td button").click(function(){
//
//             var a=$(this).prop("id").split('').slice(3);
//             a=a.join('');
//             var b=parseInt(a)-1;
//
//
//             var bool=confirm("Congrats your time will be booked from "+b+" to "+a+". Proceed ?");
//
//             if(bool)
//             {
//                 $(this).html("Booked !").prop("disabled", true).css("background-color","grey").css("color","white");
//             }
//
//       });
//
// });
