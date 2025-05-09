@extends('patient-sidebar')

@section('content')

<h1>Billing</h1>
<div class="billing-container">

    <div class="billing-summary">
        <h3>Balance Summary</h3>
        <p>Total Outstanding: <span id="total-balance">$150.00</span></p>
    </div>

    <div class="billing-invoices">
        <h2>Invoices</h2>
        <table class="invoice-table">

            <thead>
                <tr>
                    <th>Invoice Id</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="invoice-list">
                <tr>
                    <td>INV001</td>
                    <td>15 Apr, 2025</td>
                    <td>Consultation with Dr. Smith</td>
                    <td>$100.00</td>
                    <td><button id="bg-red">Pending</button></td>
                    <td><button>Pay now</button></td>
                </tr>

                <tr>
                    <td>INV003</td>
                    <td>10 Apr, 2025</td>
                    <td>Lab Test</td>
                    <td>$50.00</td>
                    <td><button id="bg-red">Pending</button></td>
                    <td><button>Pay now</button></td>
                </tr>

                <tr>
                    <td>INV003</td>
                    <td>01 Apr, 2025</td>
                    <td>Prescription Refill</td>
                    <td>$30.00</td>
                    <td><button class="status bg-green">Paid</button></td>
                    <td><button>-</button></td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="payment-method card">

        <h3>Make Payment</h3>
        <form action="">
            <span>
                <div class="input-wrapper">
                    <label for="invoice-id">Invoice ID</label>
                    <input type="text" id="invoice-id" readonly>
                </div>

                <div class="input-wrapper">
                    <label for="amount">Amount</label>
                    <input type="number" step="0.01" id="amout" readonly>
                </div>

                <div class="input-wrapper">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
                </div>

                <div class="input-wrapper">
                    <label for="expiry">Expiry Date</label>
                    <input type="text" id="expiry" placeholder="MM/YY" required>
                </div>

                <div class="input-wrapper">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" placeholder="123" required>
                </div>
            </span>

            <div class="btns">
                <button type="submit">Submit</button>
                <button type="button">Cancel</button>
            </div>
        </form>
    </div>
</div>

@endsection