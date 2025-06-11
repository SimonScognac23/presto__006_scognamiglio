<x-layout>
 
   

    <!-- FORM DI LOGIN -->
    <div class="row justify-content-center login-mg">
      <!-- Colonna per form con larghezza più ampia -->
      <div class="col-12 col-md-6 col-lg-5">
        <form action="{{ route('login') }}" method="POST" class="p-4 border rounded form-psycho shadow bg-white text-dark">
          @csrf

          

          <!-- CAMPO EMAIL -->
          <div class="mb-3 text-start">
            <label for="email" class="form-label label-psycho text-black">Email</label>
            <input type="email" name="email" class="form-control input-psycho" id="email" placeholder="Inserisci la tua email" required>
          </div>


          <!-- CAMPO PASSWORD -->
          <div class="mb-3 text-start">
            <label for="password" class="form-label label-psycho text-black">Password</label>
            <input type="password" name="password" class="form-control input-psycho" id="password" placeholder="Inserisci la tua password" required>
          </div>

          <!-- BOTTONE LOGIN -->
          <div class="d-grid">
            <button type="submit" class="btn btn-psycho btn-lg text-dark">Login</button>
          </div>

             <!-- Aggiungi il logo piccolo a destra -->
        <img src="https://s1.qwant.com/thumbr/185x185/8/f/1fff6046b1e524daf03b449582d2f914ad654dba5129a107975b2bb16439b0/th.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%3Fid%3DOIP.souk9VkX3bYXHRKFGQzkyAAAAA%26pid%3DApi&q=0&b=1&p=0&a=0" alt="Logo" class="logo">

        </form>
      </div>
    </div>

</x-layout>
