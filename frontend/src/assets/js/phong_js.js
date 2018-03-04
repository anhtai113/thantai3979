
$().ready(()=>{
    for(var i = 0; i < $("img").length; i++){
        var m = new flyObject( $($("img")[i]));
        m.fly();
    }

});

function flyObject(obj){
    this.obj = obj;
}

flyObject.prototype.fly = function(){
    setInterval(()=>{
        var objWidth = this.obj.width();
        var winWidth = window.innerWidth;

        var objX = ( this.obj.css("left") == "auto" ? 0 :this.obj.css("left") ).replace("px","");
        // var newObjX = parseInt(objX) + 1;
        // Checking pos
        if( objX >= (winWidth - objWidth) ){
            newObjX = 0 - objWidth;
        }else{
            newObjX = parseInt(objX) + 1;
        }
        this.obj.css("left", newObjX + "px" );  
    },100);
}
