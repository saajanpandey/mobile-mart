
<div class="form">
    <form action="{{route('brands.store')}}" method="POST">
        @csrf
    <div class="title">Welcome</div>
    <div class="subtitle">Let's create your account!</div>
    <div class="input-container ic1">
      <div class="cut"></div>
      <label for="firstname" class="placeholder" >Brand name</label>
      <input id="email" class="input" type="text" placeholder=" " name="name"/>
    </div>
    <button type="text" class="submit">submit</button>
</form>
  </div>
