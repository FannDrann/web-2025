function isPrimeNumber(arr) 
{
    if (Number.isInteger(arr))
    {
        if (arr > 3)
        {
            for (let i = 2; i <= arr-1; i++)
            {
                if (arr % i === 0)
                {
                    return "не простое число"
                }
            }    
        }
        return "простое число"
    }
    let result = [];
    for (let num of arr)
    {
        if ((num > 0) && (num < 4)) 
        {
            result.push(`${num} простое число`);
            continue;
        }
        if (num <= 0)
        {
            result.push(`${num} не простое число`);
            continue;
        }
        let isPrime = true;
        for (let i = 2; i <= num-1; i++)
        {
            if (num % i === 0)
            {
                isPrime = false;
                break
            }
        }
        if (isPrime) result.push(`${num} простое число`);
        else result.push(`${num} не простое число`);
    }
    return result;
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

const nameArray = array => array.map(i => i.name);

function mapObject(obj, callback) 
{
    let result = {};
    for (let key in obj)
    {
        result[key] = callback(obj[key]);
    }
    return result;
}


function getRandom(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function genPassword(num)
{
    let result = "";
    let specialchar = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', 
                        'Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P',
                        'q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p',
                        0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    result += (specialchar[getRandom(1, 10)]);
    result += (specialchar[getRandom(11, 20)]);    
    result += (specialchar[getRandom(21, 30)]);    
    result += (specialchar[getRandom(31, 40)]);
    
    return result;
}


function CombiningMapFilter(array, i1, i2) 
{
    let result = array.map(num => num * i1).filter((num => num > i2));
    return result;
}   