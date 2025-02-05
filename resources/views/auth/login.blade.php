<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
       <title>Login</title>
   </head>
   <body>
       <div class="container">
           <h2 class="mt-4">Login</h2>
           <form action="{{ route('login') }}" method="POST">
               @csrf
               <div class="form-group">
                   <label for="email">Email</label>
                   <input type="email" class="form-control" name="email" id="email" required>
               </div>
               <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" class="form-control" name="password" id="password" required>
               </div>
               <button type="submit" class="btn btn-primary">Login</button>
           </form>
       </div>
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </body>
   </html>
