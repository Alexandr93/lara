<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <div id="tree"></div>
                        safdas
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   $(document).ready(function () {
           $('#tree').jstree({
               'core': {
                   "check_callback": true,
                   'data': {
                       'url': "/tsconfig.json",
                       "data": function (node) {
                           return {'id': node.id};
                       }
                       // "check_callback" : true
                   }
               },
               "massload": {
                   "url": "/tsconfig.json",
                   "data": function (nodes) {
                       return {"ids": nodes.join("0")};
                   }
               },

               "plugins": ["contextmenu", "dnd", "massload"]
           });

           /*
                       'core': {
                           'data': {
                               'url': function (node) {
                                   return '/tsconfig.json';
                               },

                               'data': function (node) {
                                   return {
                                       parentId: node.id === "#" ? 0 : node.id,
                                       searchdepth: 1
                                   }
                               },
                               'success': function (data) {
                                   return data.list
                               }
                           },
                           'check_callback': true,
                       },
                       "plugins": ["json_data", "contextmenu" ,"dnd"]
                   })*/
       });
</script>
