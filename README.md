StaticAccess Nedir?
=================

StaticAccess sınıfı dahil edildiği sınıfın bir örneğini oluşturur ve daha sonra
bu örnek üzerinden statik olmayan metotlarınıza statik olarak erişmenizi sağlar.

Nasıl Kullanılır?
=================

Çok basit;

```php
class Members extends StaticAccess {

}
```

StaticAccess sınıfımızı genişleterek Members adında yeni bir sınıf yarattık. Peki bu kullanım için yeterli mi? Değil.
StaticAccess çalışmasına devam edebilmesi için private olmayan, public ya da protected olarak tanımlanmış instance adında statik bir özelliğe ihtiyaç duyar. Protected yapmanız yararınızadır. Trait versiyonunu kullanıyorsanız instance adında statik bir özelliği oluşturmanıza gerek yoktur.


```php
class Members extends StaticAccess {

  protected static $instance;

}
```

Evet, artık StaticAccess kısmen kullanılabilir bir durumdadır. Statik olmayan metotlarımıza statik olarak erişebilmemiz için public olan metodumuzun adının önüne static ekleyerek CamelCase olarak yazmak zorundayız.


```php
class Members extends StaticAccess {

  protected static $instance;
  
  public function staticGetUsers()
  {
    return array();
  }

}
```

getUsers adlı metodumuzun isminin önüne static eklediğimize göre StaticAccess üzerinden erişebiliriz.

```php
$users = Members::getUsers();
```

Yine aynı sınıf içerisinde bu metodumuza kendi ismiyle erişebiliriz. Sınıf içerisinde çağırırken isminin önüne static yazmak zorunda değiliz. Örneklendirmek gerekirse;

```php
class Members extends StaticAccess {

  protected static $instance;
  
  public function staticGetUsers()
  {
    return array();
  }
  
  public function staticAllUsers()
  {
    return $this->getUsers();
  }

}
```

Son olarak StaticAccess kullanarak türettiğiniz sınıfınızın örneğine ulaşmak isterseniz şu yöntemi kullanabilirsiniz;

```php
$instance = Members::getInstance();
```

