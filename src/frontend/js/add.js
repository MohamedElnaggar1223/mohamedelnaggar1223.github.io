$(document).ready(function()
{
    const cancel = document.getElementById('Cancelbtn')
    cancel.addEventListener('click', function()
    {
        window.location = '/'
    })
    const dropdown = document.getElementById('productType')
    dropdown.addEventListener('change', function()
    {
        if(dropdown.value == "dvd")
        {
            document.getElementById('atrpdesc').innerHTML = "Please Enter Size in MBs"
            document.getElementById('atrdesc').style.display = 'block'
            document.getElementById('atrdvd').style.display = 'block'
            document.getElementById('atrfurn').style.display = 'none'
            document.getElementById('atrbook').style.display = 'none'
        }
        else if(dropdown.value == "furniture")
        {
            document.getElementById('atrpdesc').innerHTML = "Please Enter Dimensions in the following order: Height, Width, Lenght"
            document.getElementById('atrdesc').style.display = 'block'
            document.getElementById('atrfurn').style.display = 'block'
            document.getElementById('atrdvd').style.display = 'none'
            document.getElementById('atrbook').style.display = 'none'
        }
        else if(dropdown.value == "book")
        {
            document.getElementById('atrpdesc').innerHTML = "Please Enter Weight in KGs"
            document.getElementById('atrdesc').style.display = 'block'
            document.getElementById('atrbook').style.display = 'block'
            document.getElementById('atrfurn').style.display = 'none'
            document.getElementById('atrdvd').style.display = 'none'
        }
        else
        {
            document.getElementById('atrdesc').style.display = 'none'
            document.getElementById('atrbook').style.display = 'none'
            document.getElementById('atrfurn').style.display = 'none'
            document.getElementById('atrdvd').style.display = 'none'
        }
    })

    const Save = document.getElementById('Savebtn')
    Save.addEventListener('click', function()
    {
        const sku = document.getElementById('sku')
        const name = document.getElementById('name')
        const price = document.getElementById('price')
        const Type = document.getElementById('productType')
        const size = document.getElementById('size')
        const height = document.getElementById('height')
        const width = document.getElementById('width')
        const length = document.getElementById('length')
        const weight = document.getElementById('weight')
        if(Type.value == "dvd")
        {
            $.post('/add-disc', {sku: sku.value, name: name.value, price: price.value, type: Type.value, extra: size.value}, function(data)
            {

            }).done(function(data)
            {
                const message = document.getElementById('message')
                message.style.display = 'block'
                message.innerHTML = data;
            })
        }
        else if(Type.value == "furniture")
        {
            $.post('/add-furn', {sku: sku.value, name: name.value, price: price.value, type: Type.value, extra: {height: height.value, width: width.value, length: length.value}}, function(data)
            {

            }).done(function(data)
            {
                const message = document.getElementById('message')
                message.style.display = 'block'
                message.innerHTML = data;
            })
        }
        else if(Type.value == "book")
        {
            $.post('/add-book', {sku: sku.value, name: name.value, price: price.value, type: Type.value, extra: weight.value}, function(data)
            {

            }).done(function(data)
            {
                const message = document.getElementById('message')
                message.style.display = 'block'
                message.innerHTML = data;
            })
        }
    })
})