@extends('layout.main')
@section('the_content')
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <div id="beerList" class="d-flex flex-wrap flex-row"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div id="beerListPaginator"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        let CSP = new URL(document.location.toString()).searchParams.get('page');
        let response = fetch( '/api/brewery/beers' + (CSP ? '?page=' + CSP : '')  , {
            method: 'GET', 
            headers: {
                'Authorization' : 'Bearer ' + sessionStorage.getItem('auth-token'),
                'Accept' : '*/*'
            }
        })
        .then( (response) => response.json() )
        .then( (response) => {
            let beerListContainer = document.getElementById('beerList');
            beerListContainer.innerHTML = '';
            for ( let beer in response ) {
                let currentBeer = response[beer];
                console.log( currentBeer );
                beerListContainer.innerHTML += `
                    <div class="bg-white p-3 shadow m-2">
                        <p>Nome: ${currentBeer.name} </p>
                        <p>Address: ${currentBeer.address_1} </p>
                        <p>Phone: <a href="tel:${currentBeer.phone}">${currentBeer.phone}</a> </p>
                        <p>${currentBeer.id}</p>
                    </div>
                `;
            }
            
            let beerListPaginator = document.getElementById('beerListPaginator');

            beerListPaginator.innerHTML += `
                    <p>
                    ${CSP > 1 ? `<a href="/all-beers?page=${parseInt(CSP)-1}">Indietro</a> - ` : ''}<a href="/all-beers?page=${CSP ? parseInt(CSP) + 1 : 2}">Avanti</a>
                `;

        })
        .finally( () => {
            // document.getElementById( 'beerList' ).innerHTML = 'Ho caricato le birre'; 
        })
    })
</script>
@endsection