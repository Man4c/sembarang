import 'package:flutter/material.dart';
import '../data/models/event_model.dart';
import '../data/mock_data/mock_events.dart';

class EventProvider with ChangeNotifier {
  List<Event> _events = [];
  List<Event> get events => _events;
  
  String _selectedCategory = 'All';
  String get selectedCategory => _selectedCategory;

  EventProvider() {
    loadEvents();
  }

  void loadEvents() {
    // Simulate API call
    _events = mockEvents;
    notifyListeners();
  }

  void selectCategory(String category) {
    _selectedCategory = category;
    notifyListeners();
  }

  List<Event> get filteredEvents {
    if (_selectedCategory == 'All') {
      return _events;
    }
    return _events.where((e) => e.category == _selectedCategory).toList();
  }
}
