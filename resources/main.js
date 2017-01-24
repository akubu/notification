
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

var router=new VueRouter();
var upload=Vue.extend({
    template: `<div id="upload">
                <h1>Upload the document to continue </h1>
                <form method="post" action="upload" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" name="submit" value="submit">upload the document</input>
                </form>
                
                    </div>`,
    data: function () {
        return{
            count:0
        }
    }
   
})

var App= Vue.extend({

})


router.map({

    '/upload':{
        component:upload
    }

});

router.start(App,'#body');



// Vue.component('count',{
//     template: '<span>{{counts}}</span>',
//     props:['counts']
//     }
// );
// new Vue({
//     el:'#upload',
//     data:function () {
//         return {
//             counts: 0
//         }
//     },
//     components:'count'
// });
