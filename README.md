# invoiceku-php-sdk
PHP SDK untuk integrasi Invoiceku.id

# Installasi
```
composer require invoiceku-id/invoiceku-php-sdk
```

# Cara Penggunaan
Berikut adalah cara penggunaan SDK Invoiceku ID

## Set Config
Anda diharuskan membuat API key terlebih dahulu [disini](https://invoiceku.id/dashboard/integration). Setelah anda membuat API key sekarang anda dapat melakukan konfigurasi untuk SDK Invoiceku.
```
\InvoicekuId\InvoicekuPhpSdk\Config::$api_key="API KEY"
```
Pastikan code diatas diset ketika inisiasi aplikasi / ketika ingin melakukan request ke endpoint Invoiceku.

## Pengolahan Data
Berikut ini adalah data-data bisa diambil menggunakan SDK ini. Sebelum maju ke langkah ini pastikan anda sudah melakukan konfigurasi API key seperti yang ada diatas.

### Mengambil Data Profile
```
new (\InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Objects\User)->myProfile();
```
Atau,
```
$user = new \InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Objects\User;

$user->myProfile();
```
Code diatas akan memberikan sebuah return berupa array yang berbentuk seperti ini:
```
[
	"id" => 1,
	"name" => "My Name",
	"email" => "my_namen@example.org",
	"phone" => "+18648474206",
	"email_verified_at" => "2023-02-03T12:22:25.000000Z",
	"is_data_verified" => 0,
	"created_at" => "2023-02-03T12:22:25.000000Z",
	"updated_at" => "2023-02-25T17:00:18.000000Z"
]
```

### Mengambil Data Setting Akun Anda
```
new (\InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Objects\User)->getSettings();
```
Atau,
```
$user = new \InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Objects\User;

$user->getSettings();
```
Code diatas akan memberikan sebuah return berupa array yang berbentuk seperti ini:
```
[
	"setting_1" => "value setting 1"
]
```

### Menyimpan Pengaturan Akun

```
use \InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Data\SettingData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Membership\Objects\User;

/**
Data untuk value bisa berupa apapun seperti array, object, integer, string dan lain-lain.
**/
$setting_data = new SettingData([
	"key" => "value"
]);

$user = new User;

$user->setSetting($setting_data);
```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
``` 
[
	"status" => true,
	"message" => "Berhasil setting data."
]
```

### Mengambil Data Payment Gateway
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Payment\Objects\PaymentGateway)->get();
```
Method / Function get dalam kode diatas bisa menerima 2 parameter berupa `integer` untuk `per_page` dan `page` karena pada endpoint menerapkan sistem pagination maka anda dapat dengam mudah mengatur berapa data yang ingin ditampilkan dalam 1 kalo request.
Berikut contoh penggunaan method get : `get(per_page:10,page:1)`

Output dari kode diatas akan berupa array seperti contoh dibawah ini:
```
[
	"current_page" => 1,
	"data" => [
		[
      		"name" => "BCA",
      		"vendor" => "Moota",
      		"meta" => [
        		"account_holder" => "Diki Akbar Asyidiq",
        		"account_number" => 4020374476,
        		"image_url" => "payment-gateways/5PyjExBBz64.png",
      		],
      		"is_active" => 0,
      		"is_pos" => 0,
      		"deleted_at" => null,
      		"created_at" => "2023-02-04T09:43:17.000000Z",
      		"updated_at" => "2023-02-17T17:15:08.000000Z",
      		"payment_gateway_id" => "l042zQGE",
    	],
    	[
      		"name" => "BCA",
      		"vendor" => "Offline",
      		"meta" => [
        		"image_url" => "Kr3qc5Z2y0wnLRSm65ECwXC3rBUUYc-metaNVB5akV4QkJ6NjQucG5n-.png",
        		"account_holder" => "Diki Akbar Asyidiq",
        		"account_number" => "4020374476",
      		],
      		"is_active" => 1,
      		"is_pos" => 0,
      		"deleted_at" => null,
      		"created_at" => "2023-02-04T12:18:49.000000Z",
      		"updated_at" => "2023-02-15T16:03:51.000000Z",
      		"payment_gateway_id" => "zn24JgvM",
    	]
	],
	"first_page_url" => "https://invoiceku.id/api/payment-gateway?page=1",
	"from" => 1,
	"last_page" => 1,
	"last_page_url" => "https://invoiceku.id/api/payment-gateway?page=1",
	"links" => [
    	[
      		"url" => null,
      		"label" => "&laquo; Sebelumnya",
      		"active" => false,
    	],
    	[
      		"url" => "https://invoiceku.id/api/payment-gateway?page=1",
      		"label" => "1",
      		"active" => true,
    	],
    	[
      		"url" => null,
      		"label" => "Berikutnya &raquo;",
      		"active" => false,
    	],
  	],
  	"next_page_url" => null,
  	"path" => "https://invoiceku.id/api/payment-gateway",
  	"per_page" => 10,
  	"prev_page_url" => null,
  	"to" => 2,
  	"total" => 2,
]

```

### Mengambil Data Product
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Product)->get();
```
Method / Function get dalam kode diatas bisa menerima 2 parameter berupa `integer` untuk `per_page` dan `page` karena pada endpoint menerapkan sistem pagination maka anda dapat dengam mudah mengatur berapa data yang ingin ditampilkan dalam 1 kalo request.
Berikut contoh penggunaan method get : `get(per_page:10,page:1)`

Output dari kode diatas akan berupa array seperti contoh dibawah ini:
```
[
  "current_page" => 1,
  "data" => [
    [
      "name" => "Testing",
      "slug" => "testing",
      "status" => "published",
      "sku" => "3213123",
      "plu" => "88999993209",
      "price" => 50000,
      "description" => "Lorem",
      "meta" => null,
      "deleted_at" => null,
      "created_at" => "2023-02-03T12:50:40.000000Z",
      "updated_at" => "2023-02-03T12:50:40.000000Z",
      "image_url" => "https://invoiceku.id/storage/1/uTvJpKEkdUFCEEt4DWcn8OeXBHqZLC-metaY29kZS0xLnBuZw==-.png",
      "product_id" => "W12N3yGR",
    ],
    [
      "name" => "Bala-Bala",
      "slug" => "bala-bala",
      "status" => "published",
      "sku" => "3213123",
      "plu" => "88999993209",
      "price" => 20000,
      "description" => "Bala-bala 12pcs",
      "meta" => null,
      "deleted_at" => null,
      "created_at" => "2023-02-14T15:12:33.000000Z",
      "updated_at" => "2023-02-14T15:12:33.000000Z",
      "image_url" => "https://is3.cloudhost.id/invoiceku/4/ntO6Nm2n48fXQ8SVvCbgWyEUTC6FaR-metaU2NyZWVuc2hvdCBmcm9tIDIwMjMtMDItMTQgMjAtNTAtMzIucG5n-.png",
      "product_id" => "pj4x8mv3",
    ],
  ],
  "first_page_url" => "https://invoiceku.id/api/product?page=1",
  "from" => 1,
  "last_page" => 1,
  "last_page_url" => "https://invoiceku.id/api/product?page=1",
  "links" => [
    [
      "url" => null,
      "label" => "&laquo; Sebelumnya",
      "active" => false,
    ],
    [
      "url" => "https://invoiceku.id/api/product?page=1",
      "label" => "1",
      "active" => true,
    ],
    [
      "url" => null,
      "label" => "Berikutnya &raquo;",
      "active" => false,
    ],
  ],
  "next_page_url" => null,
  "path" => "https://invoiceku.id/api/product",
  "per_page" => 10,
  "prev_page_url" => null,
  "to" => 2,
  "total" => 2,
]

```

### Membuat Product
```
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\ProductData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Product;

/**
	Khusus untuk image, sku, plu, meta anda dapat mengisi atau tidak mengisi field tersebut.

	Dan untuk image isi dengan path gambar / url gambar.
**/
$product_data = new ProductData([
	"image" => "/images/product-image.png",
	"name" => "Bala Bala",
	"slug" => "bala-bala",
	"status" => "published",
	"sku" => "3321442323",
	"plu" => "7732198362",
	"price" => 10000.0,
	"description" => "Bala-bala 12pcs",
	"meta" => [
		"meta-data" => "meta data value"
	],
]);

$product = new Product();

$product->create($product_data);

```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil membuat produk",
	"data" => [
		/**
			Data produk yang barusaja dibuat.
		**/
	],
]
```

### Mengambil Data Detail Product
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Product)->detail("product_id");
```
Output dari kode diatas akan berupa array seperti:
```
[
  "name" => "Bala-Bala",
  "slug" => "bala-bala",
  "status" => "published",
  "sku" => "3213123",
  "plu" => "88999993209",
  "price" => 20000,
  "description" => "Bala-bala 12pcs",
  "meta" => null,
  "deleted_at" => null,
  "created_at" => "2023-02-14T15:12:33.000000Z",
  "updated_at" => "2023-02-14T15:12:33.000000Z",
  "image_url" => "https://is3.cloudhost.id/invoiceku/4/ntO6Nm2n48fXQ8SVvCbgWyEUTC6FaR-metaU2NyZWVuc2hvdCBmcm9tIDIwMjMtMDItMTQgMjAtNTAtMzIucG5n-.png",
  "product_id" => "pj4x8mv3",
]
```

### Mengubah Data Produk
```
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\ProductData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Product;

/**
	Khusus untuk image, sku, plu, meta anda dapat mengisi atau tidak mengisi field tersebut.

	Dan untuk image isi dengan path gambar / url gambar.
**/
$product_data = new ProductData([
	"image" => "/images/product-image.png",
	"name" => "Bala Bala",
	"slug" => "bala-bala",
	"status" => "published",
	"sku" => "3321442323",
	"plu" => "7732198362",
	"price" => 10000.0,
	"description" => "Bala-bala 12pcs",
	"meta" => [
		"meta-data" => "meta data value"
	],
]);

$product = new Product();

$product->update("product_id", $product_data);

```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil mengubah produk",
	"data" => [
		/**
			Data produk yang barusaja diubah.
		**/
	],
]
```

### Mengambil Data Customer
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Customer)->get();
```
Method / Function get dalam kode diatas bisa menerima 2 parameter berupa `integer` untuk `per_page` dan `page` karena pada endpoint menerapkan sistem pagination maka anda dapat dengam mudah mengatur berapa data yang ingin ditampilkan dalam 1 kalo request.
Berikut contoh penggunaan method get : `get(per_page:10,page:1)`

Output dari kode diatas akan berupa array seperti contoh dibawah ini:
```
[
  "current_page" => 1,
  "data" => [
    [
      "name" => "Example 1",
      "email" => "example_1@example.org",
      "phone" => "08999389273",
      "addresses" => [
        [
          "city" => "Bandung",
          "state" => "Jawa Barat",
          "country" => "Indonesia",
          "full_address" => "Jl uhuy Ahay",
        ],
      ],
      "deleted_at" => null,
      "created_at" => "2023-02-03T12:51:23.000000Z",
      "updated_at" => "2023-02-03T12:51:23.000000Z",
      "customer_id" => "W10cNyGR",
    ],
    [
      "name" => "Example 2",
      "email" => "example_2@example.org",
      "phone" => "0877782367235",
      "addresses" => [],
      "deleted_at" => null,
      "created_at" => "2023-02-04T11:06:45.000000Z",
      "updated_at" => "2023-02-04T11:06:45.000000Z",
      "customer_id" => "yV2v3N4D",
    ]
  ],
  "first_page_url" => "https://invoiceku.id/api/customer?page=1",
  "from" => 1,
  "last_page" => 1,
  "last_page_url" => "https://invoiceku.id/api/customer?page=1",
  "links" => [
    [
      "url" => null,
      "label" => "&laquo; Sebelumnya",
      "active" => false,
    ],
    [
      "url" => "https://invoiceku.id/api/customer?page=1",
      "label" => "1",
      "active" => true,
    ],
    [
      "url" => null,
      "label" => "Berikutnya &raquo;",
      "active" => false,
    ],
  ],
  "next_page_url" => null,
  "path" => "https://invoiceku.id/api/customer",
  "per_page" => 10,
  "prev_page_url" => null,
  "to" => 2,
  "total" => 2,
]

```

### Buat Customer
```
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\CustomerData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\CustomerAddressData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Customer;

$customer_data = new CustomerData([
	"name" => "example customer",
	"email" => "example@example.org",
	"phone" => "53526176532",
	"addresses" => [
		new CustomerAddressData([
			"full_address" => "jl uhuy ahay",
			"city" => "Bandung",
			"state" => "Jawa Barat",
			"country" => "Indonesia"
		])
	]
]);

$customer = new Customer;

$customer->create($customer_data);

```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil membuat customer",
	"data" => [
		/**
			Data customer yang barusaja dibuat.
		**/
	],
]
```

### Mengambil Data Detail Customer
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Customer)->detail("product_id");
```
Output dari kode diatas akan berupa array seperti:
```
[
  "name" => "example customer",
  "email" => "example@example.org",
  "phone" => "9911739",
  "addresses" => [],
  "deleted_at" => null,
  "created_at" => "2023-02-12T14:51:00.000000Z",
  "updated_at" => "2023-02-12T14:51:00.000000Z",
  "customer_id" => "Db1GWrvM",
]
```

### Menghapus Customer
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Customer)->delete("customer_id");
```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil menghapus customer"
]
```

### Mengubah Customer
```
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\CustomerData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\CustomerAddressData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Customer;

$customer_data = new CustomerData([
	"name" => "example customer",
	"email" => "example@example.org",
	"phone" => "53526176532",
	"addresses" => [
		new CustomerAddressData([
			"full_address" => "jl uhuy ahay",
			"city" => "Bandung",
			"state" => "Jawa Barat",
			"country" => "Indonesia"
		])
	]
]);

$customer = new Customer;

$customer->update("customer_id", $customer_data);
```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil mengubah customer",
	"data" => [
		/**
			Data customer yang barusaja diubah.
		**/
	],
]

```

### Mengambil Data Invoice
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Invoice)->get();
```
Method / Function get dalam kode diatas bisa menerima 3 parameter berupa `integer` dan `string` untuk `per_page`, `page` dan `order_by` karena pada endpoint menerapkan sistem pagination maka anda dapat dengam mudah mengatur berapa data yang ingin ditampilkan dalam 1 kalo request.
Berikut contoh penggunaan method get : `get(per_page:10, page:1, order_by:"asc")`

Output dari kode diatas akan berupa array seperti contoh dibawah ini:
```
[
  "current_page" => 1,
  "data" => [
    [
      "invoice_code" => "inv-66732693",
      "description" => null,
      "status" => "expired",
      "note" => null,
      "unique_code" => 705,
      "amount" => 50000,
      "total" => 50705,
      "payment_response" => null,
      "expired_at" => "2023-02-04T17:00:00.000000Z",
      "payment_at" => null,
      "deleted_at" => null,
      "created_at" => "2023-02-04T09:43:46.000000Z",
      "updated_at" => "2023-02-11T08:24:17.000000Z",
      "invoice_id" => "l0x2zQGE",
      "payment_link" => "https://invoiceku.id/payment/l02zQGE",
      "payment_detail" => [
        "image_url" => "https://is3.cloudhost.id/invoiceku/payment-gateways/5PyjExBBz64.png",
        "account_holder" => "Diki Akbar Asyidiq",
        "account_number" => 4020374476,
      ],
      "invoice_items" => [
        [
          "name" => "Testing",
          "description" => "Lorem",
          "quantity" => 1,
          "price" => 50000,
          "image_url" => "https://invoiceku.id/storage/1/uTvJpKEkdUFCEEt4DWcn8OeXBHqZLC-metaY29kZS0xLnBuZw==-.png",
          "deleted_at" => null,
          "created_at" => "2023-02-04T09:43:46.000000Z",
          "updated_at" => "2023-02-04T09:43:46.000000Z",
          "invoice_item_id" => "l02xzQGE",
          "short_description" => "Lorem",
        ],
      ],
      "payment_gateway" => [
        "name" => "BCA",
        "vendor" => "Moota",
        "meta" => [
          "account_holder" => "Diki Akbar Asyidiq",
          "account_number" => 4020374476,
          "image_url" => "payment-gateways/5PyjExBBz64.png",
        ],
        "is_active" => 0,
        "is_pos" => 0,
        "deleted_at" => null,
        "created_at" => "2023-02-04T09:43:17.000000Z",
        "updated_at" => "2023-02-17T17:15:08.000000Z",
        "payment_gateway_id" => "l02dzQGE",
      ],
      "customer" => [
        "name" => "Diki Akbar",
        "email" => "diki.akbar1304@gmail.com",
        "phone" => "0813414833646",
        "addresses" => [
          [
            "city" => "Bandung",
            "state" => "Jawa Barat",
            "country" => "Indonesia",
            "full_address" => "Jl Terusan Cikutra Baru no 3B",
          ],
        ],
        "deleted_at" => null,
        "created_at" => "2023-02-03T12:51:23.000000Z",
        "updated_at" => "2023-02-03T12:51:23.000000Z",
        "customer_id" => "W12xNyGR",
      ],
    ],
    [
      "invoice_code" => "INV-202302040606457",
      "description" => "Pembelian Paket Starter untuk 1 bulan.",
      "status" => "expired",
      "note" => "Transfer sesuai dengan nominal yang ditentukan hinggal 3 digit terakhir.",
      "unique_code" => 328,
      "amount" => 50000,
      "total" => 50328,
      "payment_response" => null,
      "expired_at" => "2023-02-05T11:06:45.000000Z",
      "payment_at" => null,
      "deleted_at" => null,
      "created_at" => "2023-02-04T11:06:45.000000Z",
      "updated_at" => "2023-02-11T08:24:20.000000Z",
      "invoice_id" => "zn4JgfvM",
      "payment_link" => "https://invoiceku.id/payment/zn4JgvM",
      "payment_detail" => [
        "image_url" => "https://is3.cloudhost.id/invoiceku/payment-gateways/5PyjExBBz64.png",
        "account_holder" => "Diki Akbar Asyidiq",
        "account_number" => 4020374476,
      ],
      "invoice_items" => [
        [
          "name" => "Starter",
          "description" => "Untuk UMKM atau usaha kecil dengan harga yang kecil untuk mendapatkan kualitas yang premium.",
          "quantity" => 1,
          "price" => 50000,
          "image_url" => "https://invoiceku.id/images/colored-logo.jpg",
          "deleted_at" => null,
          "created_at" => "2023-02-04T11:06:45.000000Z",
          "updated_at" => "2023-02-04T11:06:45.000000Z",
          "invoice_item_id" => "zn4dJgvM",
          "short_description" => "Untuk UMKM atau usaha kecil dengan harga yang keci ...",
        ],
      ],
      "payment_gateway" => [
        "name" => "BCA",
        "vendor" => "Moota",
        "meta" => [
          "account_holder" => "Diki Akbar Asyidiq",
          "account_number" => 4020374476,
          "image_url" => "payment-gateways/5PyjExBBz64.png",
        ],
        "is_active" => 0,
        "is_pos" => 0,
        "deleted_at" => null,
        "created_at" => "2023-02-04T09:43:17.000000Z",
        "updated_at" => "2023-02-17T17:15:08.000000Z",
        "payment_gateway_id" => "l021zQGE",
      ],
      "customer" => [
        "name" => "Diki Akbar",
        "email" => "diki.akbar13042000@gmail.com",
        "phone" => "62813431483647",
        "addresses" => [],
        "deleted_at" => null,
        "created_at" => "2023-02-04T11:06:45.000000Z",
        "updated_at" => "2023-02-04T11:06:45.000000Z",
        "customer_id" => "yVv33N4D",
      ],
    ]
  ],
  "first_page_url" => "https://invoiceku.id/api/invoice?page=1",
  "from" => 1,
  "last_page" => 2,
  "last_page_url" => "https://invoiceku.id/api/invoice?page=2",
  "links" => [
    [
      "url" => null,
      "label" => "&laquo; Sebelumnya",
      "active" => false,
    ],
    [
      "url" => "https://invoiceku.id/api/invoice?page=1",
      "label" => "1",
      "active" => true,
    ],
    [
      "url" => "https://invoiceku.id/api/invoice?page=2",
      "label" => "2",
      "active" => false,
    ],
    [
      "url" => "https://invoiceku.id/api/invoice?page=2",
      "label" => "Berikutnya &raquo;",
      "active" => false,
    ],
  ],
  "next_page_url" => "https://invoiceku.id/api/invoice?page=2",
  "path" => "https://invoiceku.id/api/invoice",
  "per_page" => 10,
  "prev_page_url" => null,
  "to" => 2,
  "total" => 2,
]

```

### Buat Invoice
```
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\InvoiceData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Data\InvoiceItemData;
use \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Invoice;

$invoice_data = new InvoiceData([
  'customer_id' => "W1x2NyGR",
  "payment_gateway_id" => "8x23jZ2a",
  "invoice_code" => "INV-0009932973",
  "expired_at" => "2023-02-03 12:00:00",
  "items" => [
    new InvoiceItemData([
      "name" => "Testing",
      "product_id" => "Wx12NyGR",
      "quantity" => 1,
      "price" => 200000
    ])
  ]
]);

$invoice = new Invoice;

$invoice->create($invoice_data)

```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil membuat invoice",
	"data" => [
		/**
			Data invoice yang barusaja dibuat.
		**/
	],
]
```

### Mengambil Data Detail Invoice
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Invocice)->detail("invoice_id");
```
Output dari kode diatas akan berupa array seperti:
```
[
  "status" => true,
  "data" => [
    "invoice_code" => "ORDER-20230213224336",
    "description" => null,
    "status" => "success",
    "note" => null,
    "unique_code" => 501,
    "amount" => 100000,
    "total" => 100501,
    "payment_response" => null,
    "expired_at" => null,
    "payment_at" => null,
    "deleted_at" => null,
    "created_at" => "2023-02-13T15:43:36.000000Z",
    "updated_at" => "2023-02-13T16:20:14.000000Z",
    "invoice_id" => "z6xG61vp",
    "payment_link" => "https://invoiceku.id/payment/z6G61vp",
    "payment_detail" => [
      "image_url" => "https://is3.cloudhost.id/invoiceku/payment-gateways/5PyjExBBz64.png",
      "account_holder" => "Diki Akbar Asyidiq",
      "account_number" => 4020374476,
    ],
  ],
]

```

### Mengubah Status Invoice
```
(new \InvoicekuId\InvoicekuPhpSdk\Domains\Invoice\Objects\Invoice)->updateStatus("invoice_id", "success");
```
Return atau output dari kode diatas akan sesuai dengan output yang ada di API, jika anda berhasil menyimpan settingan maka status output status akan menjadi `true` dan jika tidak berhasil maka akan memberikan output sebaliknya yaitu `false`.
Contoh output:
```
[
	"status" => true,
	"message" => "Berhasil mengubah status Invoice"
]

```

## Conclusion
Diatas ini adalah tutorial / cara memakai SDK Invoiceku mulai dari konfigurasi sampai pengolahan data yang tersedia di Invoiceku ID.
Jika anda masih merasa kesulitan untuk mengimplementasikan tutorial diatas hubungu kami diemail `cs@invoiceku.id` atau DM di sosial media kami:
[Instagram](https://instagram.com/invoiceku.id)
[Twitter](https://twitter.com/invoiceku_id)
