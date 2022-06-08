$('#button').click(function(e)
{
    e.preventDefault();
    let name = $('input[name = "name"]').val()
    const regex = new RegExp("^(?=\\s*\\S).*$");
    if(regex.test(name))
    {
        $.ajax({
            url: './mainlogic.php',
            type: 'POST',
            dateType: 'json',
            data: {
                name,
                method: 'add'
            },
            success (data)
            {
                console.log(data)
                data = $.parseJSON(data)
                console.log(data)
                if(data.check)
                {
                    document.location.href = "/lr/borrowers.php"
                }
                else
                {
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }
    else
    {
        $('#errorR').css({display: "block"}).text("Цель займа должна быть не пустой"); 
    }
})

$('#errorR').click(()=>
{
    $('#errorR').css({display: "none"})
})

const editFunction = (id) =>
{
    let name = $('input[name = "name"]').val()
    const regex = new RegExp("^(?=\\s*\\S).*$");
    if(regex.test(name))
    {
        $.ajax({
            url: './mainlogic.php',
            type: 'PUT',
            dateType: 'json',
            data: {
                id, name
            },
            success (data)
            {
                console.log(data)
                data = $.parseJSON(data)
                console.log(data)
                if(data.check)
                {
                    document.location.href = "/lr/borrowers.php"
                }
                else
                {
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
    }
    else
    {
        $('#errorR').css({display: "block"}).text("Цель займа должна быть не пустой"); 
    }
}

const delFunction = (id) =>
{
    $.ajax({
        url: './mainlogic.php',
        type: 'DELETE',
        dateType: 'json',
        data: {
            id
        },
        success (data) 
		{
            data = $.parseJSON(data)
            console.log(data)
            if(data.check)
			{
                document.location.href = "/lr/borrowers.php"
            }
        }
    })
}

const handOverFunction = (del_id) =>
{
    let selected_id = $('select[name = "customer"]').val()
        $.ajax({
            url: './mainlogic.php',
            type: 'POST',
            dateType: 'json',
            data: {
                selected_id,del_id,
                method: 'handOver'
            },
            success (data)
            {
                console.log(data)
                data = $.parseJSON(data)
                console.log(data)
                if(data.check)
                {
                    document.location.href = "/lr/borrowers.php"
                }
                else
                {
                    $('#errorR').css({display: "block"}).text("Данные не загрузились");
                }
            }
        })
}