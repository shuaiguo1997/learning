<!DOCTYPE html>

<html> 

<body> 
<form action="formvalidate" method="get" > 
    @csrf
    <div> 
        <span class="label">用户名</span> 
        <span class="txt"><input type="text" name="name" class="@error('name') is-invalid @enderror" /></span> 
        @error('name')
        <b style="color:red">
            {{$message}}
        </b>
        @enderror
    </div> 
    
    <div> 
        <span class="label">年龄</span> 
        <span class="txt"><input type="text"  name="age" class="@error('age') is-invalid @enderror"/>
            @error('age')
            <b style="color:red">
                {{$message}}
            </b>
            @enderror
        </span> 
    </div> 
    <div> 
        <span class="label">验证码</span> 
        <img src="{{captcha_src()}}">
        <span class="txt"><input type="captcha"  name="captcha" class="@error('captcha') is-invalid @enderror"/>
            @error('captcha')
            <b style="color:red">
                {{$message}}
            </b>
            @enderror
        </span> 
    </div> 
    <div> 
        <span class="label"></span> 
        <span class="txt"><button type='submit'>提交</button></span> 
    </div> 
    
</form> 
</body> 
</html>