
<div class="form">
    <form action="{{route('products.store')}}" method="POST" enctype='multipart/form-data'>
        @csrf
    <div class="title">Welcome</div>
    <div class="subtitle">Let's create your account!</div>
    <div class="input-container ic1">
      <div class="cut"></div>
      <label for="firstname" class="placeholder" >Product name</label>
      <input id="email" class="input" type="text" placeholder=" " name="name"/>
    </div>
    <div class="cut"></div>
      <label for="firstname" class="placeholder" >Price</label>
      <input id="email" class="input" type="text" placeholder=" " name="price"/>
    </div><div class="cut"></div>
    <label for="firstname" class="placeholder" >Image</label>
    <input id="email" class="input" type="file" placeholder=" " name="image"/>
  </div>
    <button type="text" class="submit">submit</button>
</form>
  </div>
