$(document).ready(function()
{
     $.post('/display', {}, function(data)
            {
            }).done(function(data)
            {
                const Grid = document.getElementById('Gridid')
                Grid.innerHTML = data

            })
    document.getElementById('Addbtn').addEventListener('click', function()
    {
        window.location = 'add-product'
    })
    const MassDelBtn = document.getElementById('delbtn')
    MassDelBtn.addEventListener('click', function()
    {
        var checkedProducts = []
        var AllProducts = document.getElementsByClassName('.delete-checkbox')
        for(var i = 0; i < AllProducts.length; i++)
        {
            if(AllProducts[i].checked)
            {
                checkedProducts.push(AllProducts[i].id)
            }
        }
        $.post('/massDelete', {checked: checkedProducts}, function(data)
        {
            window.location = '/'
        })
    })
})