class Product {
  final int id;
  final String name;
  final int price;

  Product({required this.id, required this.name, required this.price});

  // Fungsi untuk mengubah format JSON menjadi objek Product
  factory Product.fromJson(Map<String, dynamic> json) {
    return Product(id: json['id'], name: json['name'], price: json['price']);
  }
}
