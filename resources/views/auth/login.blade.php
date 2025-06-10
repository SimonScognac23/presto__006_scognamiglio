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
        </form>
      </div>
    </div>

</x-layout>
