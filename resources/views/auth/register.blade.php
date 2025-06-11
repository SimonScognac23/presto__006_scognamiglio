<x-layout>

  <!-- SECTION: Container generale con sfondo e centratura verticale -->
  <div class="container-fluid register-bg d-flex align-items-center justify-content-center min-vh-100">

    <!-- SECTION: Riga centrale contenente il form -->
    <div class="row justify-content-center text-center w-100">

      <!-- SECTION: Colonna responsive che contiene titolo, form e logo -->
      <div class="col-12 col-md-8 col-lg-6 position-relative">

        <!-- Aggiungi il logo piccolo a destra -->
        <img src="https://s1.qwant.com/thumbr/185x185/8/f/1fff6046b1e524daf03b449582d2f914ad654dba5129a107975b2bb16439b0/th.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%3Fid%3DOIP.souk9VkX3bYXHRKFGQzkyAAAAA%26pid%3DApi&q=0&b=1&p=0&a=0" alt="Logo" class="logo">

        <!-- SECTION: Titolo della pagina -->
        <h1 class="mb-4 text-uppercase fw-bold custom-subtitle text-black">
          Registrati
        </h1>




          <!-- SECTION: Form di registrazione -->
        <form
          action="{{ route('register') }}"    
          method="POST"                       
          class="bg-white text-dark p-4 p-md-5 rounded-4 shadow-lg mx-auto"  
          novalidate                        
        >
          @csrf  <!-- Protezione CSRF di Laravel -->

          <!-- INPUT: Email -->
          <div class="mb-4 text-start">
            <label for="email" class="form-label fw-semibold text-black">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              class="form-control"
              placeholder="Inserisci la tua email"
              required
            >
          </div>

          <!-- INPUT: Nome -->
          <div class="mb-4 text-start">
            <label for="name" class="form-label fw-semibold text-black">{{ __('ui.name') }}</label>
            <input
              type="text"
              name="name"
              id="name"
              class="form-control"
              placeholder="Inserisci il tuo nome"
              required
            >
          </div>

          <!-- INPUT: Password -->
          <div class="mb-4 text-start">
            <label for="password" class="form-label fw-semibold text-black">Password</label>
            <input
              type="password"
              name="password"
              id="password"
              class="form-control"
              placeholder="Crea una password"
              required
              minlength="8"
            >
          </div>

          <!-- INPUT: Conferma Password -->
          <div class="mb-5 text-start">
            <label for="password_confirmation" class="form-label fw-semibold text-black">{{ __('ui.confirm_password') }}</label>
            <input
              type="password"
              name="password_confirmation"
              id="password_confirmation"
              class="form-control"
              placeholder="Conferma la password"
              required
              minlength="8"
            >
          </div>

          <!-- SECTION: Bottone di invio -->
          <div class="d-grid">
            <button type="submit" class="btn btn-lg fw-semibold shadow btn-black-text">
             {{ __('ui.register') }}
            </button>
          </div>

        </form>
        <!-- END FORM -->


      </div> 
    </div> 


     
  </div> 


  

</x-layout>
