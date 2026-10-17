import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/product.dart';

class ApiService {
  final String baseUrl = 'http://127.0.0.1:8000';

  Future<List<Product>> getProducts() async {
    try {
      final response = await http.get(Uri.parse('$baseUrl/api/products'));

      if (response.statusCode == 200) {
        final Map<String, dynamic> jsonData = jsonDecode(response.body);
        final List<dynamic> products = jsonData['data'];

        return products.map((item) => Product.fromJson(item)).toList();
      } else {
        throw Exception('Gagal mengambil data');
      }
    } catch (error) {
      throw Exception('Terjadi kesalahan: $error');
    }
  }
}
