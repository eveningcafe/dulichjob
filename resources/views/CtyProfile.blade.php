<?php
foreach ($data as $row) {
	$ctyname = $row->ten;
	$gioithieu = $row->tu_gioi_thieu;
	$website = $row->website_url;
	$image = $row->avatar_url;
}
if (!isset($ctyname)) {
	$ctyname = '';
}
if (!isset($gioithieu)) {
	$gioithieu = '';
}
if (!isset($website)) {
	$website = '';
}
if (!isset($image)) {
	$image = '';
}
$count = $vp->count();
if ($count != 0) {
	foreach ($vp as $key => $row) {
		$address[$key] = $row->dia_chi;
		$email[$key] = $row->email;
		$phone[$key] = $row->so_dien_thoai;
	}
} else {
	$count = 1;
	$address[0] = '';
	$email[0] = '';
	$phone[0] = '';
}
?>

<script>
    function addForm()
    {
        var a = document.createElement('label');
        a.setAttribute("for","description");
        a.setAttribute("class","col-md-4 control-label");
        var b = document.createTextNode("Văn phòng");
        a.appendChild(b);
        var c = document.createElement('div');
        c.appendChild(a);
        document.getElementById("additional").appendChild(c);

        var d = document.createElement('label');
        d.setAttribute("for","address");
        d.setAttribute("class","col-md-4 control-label");
        var e = document.createTextNode("Địa chỉ");
        d.appendChild(e);
        document.getElementById("additional").appendChild(d);

        var f = document.createElement('div');
        f.setAttribute("class","col-md-6");
        var g = document.createElement('input');
        g.setAttribute("type","text");
        g.setAttribute("class","form-control");
        g.setAttribute("name","address[]");
        g.setAttribute("required","");
        g.setAttribute("autofocus","");
        f.appendChild(g);
        document.getElementById("additional").appendChild(f);

        var h = document.createElement('label');
        h.setAttribute("for","email");
        h.setAttribute("class","col-md-4 control-label");
        var i = document.createTextNode("Email");
        h.appendChild(i);
        document.getElementById("additional").appendChild(h);

        var j = document.createElement('div');
        j.setAttribute("class","col-md-6");
        var k = document.createElement('input');
        k.setAttribute("type","email");
        k.setAttribute("class","form-control");
        k.setAttribute("name","email[]");
        k.setAttribute("required","");
        k.setAttribute("autofocus","");
        j.appendChild(k);
        document.getElementById("additional").appendChild(j);

        var l = document.createElement('label');
        l.setAttribute("for","phone");
        l.setAttribute("class","col-md-4 control-label");
        var m = document.createTextNode("Điện thoại");
        l.appendChild(m);
        document.getElementById("additional").appendChild(l);

        var n = document.createElement('div');
        n.setAttribute("class","col-md-6");
        var o = document.createElement('input');
        o.setAttribute("type","tel");
        o.setAttribute("class","form-control");
        o.setAttribute("name","phone[]");
        o.setAttribute("required","");
        o.setAttribute("autofocus","");
        n.appendChild(o);
        document.getElementById("additional").appendChild(n);

        var list = document.getElementById("additional");
        var count = list.children.length;
        var child = list.children;
        console.log(count);
        for(i=0;i<count;i++){
            console.log(child[i].nodeName);
        }
        console.log("--------------------------");
    }

    function resetForm()
    {
         /*location.reload();
         console.log("--------------------------");*/
        var list = document.getElementById("additional");
        var count = list.children.length;
        var child = list.children;
        while(list.firstChild)
        {
            list.removeChild(list.firstChild);
        }
        addForm();

        console.log(count);
        for(i=0;i<count;i++){
            console.log(child[i].nodeName);
        }
        console.log("--------------------------");
    }
</script>


@extends('layouts.app')

@section('content')
<!-- khung -->
<div style=" margin-top: 99px;border-style: ridge;">
<!-- noi dung -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading">Profile</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/CtyProfile/update">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $ctyname; ?>" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Tự giới thiệu</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control" name="description" cols="50" rows="5" required><?php echo $gioithieu; ?></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">Website URL</label>

                            <div class="col-md-6">
                                <input id="link" type="url" class="form-control" name="link" value="<?php echo $website; ?>" required>

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Link ảnh công ty</label>

                            <div class="col-md-6">
                                <input id="image" type="url" class="form-control" name="image" value="<?php echo $image; ?>" required>

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id='additional'>
                        <?php
for ($i = 0; $i < $count; $i++) {
	echo '<div><label for="description" class="col-md-4 control-label">Văn phòng </label></div>


                            <label for="address" class="col-md-4 control-label">Địa chỉ</label>

                            <div class="col-md-6">';
	echo '<input id="address" type="text" class="form-control" name="address[]" value="' . $address[$i] . '" required autofocus>


                            </div>



                            <label for="email[]" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">';
	echo '<input id="email" type="email" class="form-control" name="email[]" value="' . $email[$i] . '" required autofocus>


                            </div>



                            <label for="phone[]" class="col-md-4 control-label">Điện thoại</label>

                            <div class="col-md-6">';
	echo '<input id="phone" type="tel" class="form-control" name="phone[]" value="' . $phone[$i] . '" required autofocus>


                            </div>';
}

?>


                        </div>



                        <br><div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>






                    </form>
                    <br><div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button onclick="addForm()" class="btn btn-primary">Thêm văn phòng</button>
                            </div>
                        </div>
                        <br><div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button onclick="resetForm()" class="btn btn-primary">Xóa toàn bộ văn phòng</button>
                            </div>
                        </div>


                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-2">
        	<img alt="Company image here" src="<?php echo $image; ?> " height="150" width="200"/>
        </div>
    </div>
</div>
</div>
@endsection

