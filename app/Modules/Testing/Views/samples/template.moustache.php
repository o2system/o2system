<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moustache</title>
</head>
<body>
<h4>Welcome {{$username}}</h4>
{{if($level == 1)}}
Administrator
{{/if}}

<hr>
Conditional If - Else if :
<br>
{{if(1 == 2)}}
{{elseif( 2 == 2)}}
Else IF Success
{{/if}}

<hr>
Conditional If - Else :
<br>
{{if(1 == 2)}}
{{else}}
Else Success
{{/if}}

<hr>
Looping :
<br>
<ul>
    {{for($a=1; $a<5; $a++)}}
    <li>{{$a}}</li>
    {{/for}}
</ul>

<hr>
Foreach :
<br>
<div>
    {{foreach($navigation as $item)}}
    | {{$item}} |
    {{/foreach}}
</div>

<hr>
While :
<br>
{{$a = 0}}
{{while($a < 5)}}
<strong>{{$a}}</strong>
{{$a++}}

{{if($a == 3)}}
{{break}}
{{/if}}
{{/while}}
{{$a}}

</body>
</html>