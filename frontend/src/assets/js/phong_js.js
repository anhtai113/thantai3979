
$().ready(()=>{
    for(var i = 0; i < $("img.cloud").length; i++){
        var m = new flyObject( $($("img.cloud")[i]));
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

        var objX = 0;
        if( this.obj.css("left") != "auto" ){
            objX = this.obj.css("left").replace("px","");
        }
        // ( this.obj.css("left") == "auto" ? 0 :this.obj.css("left") );
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
