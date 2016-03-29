function $_GET() {
  var  url = location.href,
       prefix = url.search(/\?/),
       objGet = {},
       reg = /[\`\'\~\!\@\#\$\%\^\*\(\)\-\_\+\*\-\.\,\:\;\[\]\{\}\]\/]/; 
            
   url = url.substring(prefix + 1);
  
  //Отдяелям строку с GET параметрами
  if (url.match(reg)) {
    url =  url.substr(0, url.search(reg));
  }
  
  //Отдялем GET запросы 
  var get = url.split('&');
  
  //Отдяелям GET параметры
  for (var s = 0; s < get.length; s++) {
       get[s] = get[s].split('=');
       
       //Создание объекта
       objGet[get[s][0]] = get[s][1]  
  }
  return objGet; 
}
var GET = $_GET();

function l(log) {
    console.log(log);
}