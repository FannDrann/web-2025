function isPrimeNumber(num) 
{
    if (num > 0)
    {
        for (let i = 2; i < num-1; i++) 
            {
                if (num % i === 0) 
                {
                    return "не простое число"
                }
                
            }
            return "простое число"
    }
    return "не простое число"
}

function countVowels(str) {
    vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']
    count = 0
    for (let i of str)
    {
        if (vowels.includes(i))
        {
            count += 1
        }
    }
    return count
}


function uniqueElements(array) 
{
    let result = {};
    for (let key of array) 
    {
        result[key] = (result[key] || 0) + 1;
    }
    return result;
}

function mergeObjects(obj1, obj2) 
{
    let result = {};
    
    for (let key in obj1) 
    {
        result[key] = obj1[key];
    }
    
    for (let key in obj2) 
    {
        result[key] = obj2[key];
    }
    
    return result;
}

function nameArray(array) 
{
    let result = array.map(i => i.name);
    return result;
}

function genPassword(num)
{
    let result = "";
    let specialchar = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')'];
    let upperchar = ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'];
    let lowerchar = ['q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'];
    let digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    for (let i = 0; i < num; i++)
    {
        result += (specialchar[Math.floor(Math.random() * 10)]);
        result += (upperchar[Math.floor(Math.random() * 10)]);    
        result += (lowerchar[Math.floor(Math.random() * 10)]);    
        result += (digits[Math.floor(Math.random() * 10)]);        
    }
    return result;
}


function CombiningMapFilter(array, i1, i2) 
{
    let result = array.map(num => num * i1).filter((num => num > i2));
    return result;
}   