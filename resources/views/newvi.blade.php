
<?php

//$sotr иерархический массив
//print_r($sotr);


//$so=json_encode($s);
//echo $s;

?>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.3/themes/default/style.min.css"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.3/jstree.min.js"></script>


<div id="tree"></div>

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

    });


</script>


