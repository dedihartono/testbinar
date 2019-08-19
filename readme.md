
<p align="center">
<a href="https://travis-ci.com/dedihartono/testbinar"><img src="https://travis-ci.com/dedihartono/testbinar.svg?branch=master" alt="Build Status"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-yellow.svg" alt="Licenses"></a>
</p>

# Instalation

Cara 1 :
 1. Pilih Clone/Download
 2. Pilih Download Zip
 3. Extract file
 4. Masuk ke directory project
 5. Buka terminal dan jalankan : 
 6. composer install
 7. Buat database dengan nama 'testbinar' dan 'testbinar_testing'
 8. Buka kembali terminal dan jalankan : 
 9. php artisan migrate --seed
10. php -S localhost:8000 -t public

Cara 2 :
 1. Buka terminal dan jalankan :
 2. git clone https://github.com/dedihartono/testbinar.git
 3. cd testbinar #(untuk masuk ke directory project)
 4. composer install
 5. Buat database dengan nama 'testbinar' dan 'testbinar_testing'
 6. Buka kembali terminal dan jalankan : 
 7. php artisan migrate --seed
 8. php -S localhost:8000 -t public

Note : 
- PC telah terinstall php versi 7++
- PC telah terinstall composer

# Running Test
1. Buka Terminal dan jalankan :
2. vendor/bin/phpunit

# Demo
 - Tahap staging test menggunakan Travis-CI
 - Tahap Production menggunakan Heroku
  
   https://testbinard.herokuapp.com/

# Postman Documentation
   https://documenter.getpostman.com/view/2136751/SVfH1sNg
